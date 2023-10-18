<?php

namespace App\Http\Service\User;

use App\Enums\RoleTypeEnum;
use App\Http\Repositories\User\UserRepository;
use App\Http\Service\BaseService;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class UserService extends BaseService
{
    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function createUserWithRole(array $userData, string $roleName): Model
    {
        $user = $this->create($userData);
        // Assign the role to the user
        $user->assignRole($roleName);

        return $user;
    }

    /**
     * Update a user's information and roles.
     */
    public function updateUserWithRole(User $user, array $userData, ?string $roleName): Model
    {
        // Update the user's information
        $this->update(
            where: ['id' => $user->id],
            data: $userData
        );
        // If a role name is provided, update the user's roles
        if ($roleName !== null) {
            $user->roles()->detach();
            $user->assignRole($roleName);
        }

        return $user;
    }

    public function checkAdministration($userID): bool
    {
        return $this->repository->role(RoleTypeEnum::ADMINISTRATION->value)->first()->id == $userID;
    }

    public function getDatatables(): JsonResponse
    {
        $data = $this->select(
            with: ['roles'],
            select: [
                'users.*',
                DB::raw('CONCAT(first_name, " ", last_name) as full_name'),
            ],
        );

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('role', function ($user) {
                $roleColor = $user->role_color;
                $roleName = trans('enums.roles.'.$user?->getRoleNames()?->first());

                return "<span class='inline-flex items-center rounded-md bg-{$roleColor}-50 px-2 py-1 text-xs font-medium text-{$roleColor}-600 ring-1 ring-inset ring-{$roleColor}-500/10/20'>{$roleName}</span>";
            })
            ->addColumn('action', fn ($user) => \view('users.partials.table-action', compact('user'))->render())
            ->filterColumn('full_name', function ($query, $keyword) {
                $query->whereRaw("CONCAT(first_name, ' ', last_name) like ?", ["%$keyword%"]);
            })
            ->rawColumns(['action', 'role'])
            ->make(true);
    }
}
