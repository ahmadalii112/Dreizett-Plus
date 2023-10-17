<?php

namespace App\Http\Service;

use App\Enums\RoleTypeEnum;
use App\Http\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
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

    public function getDatatables($data)
    {
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('full_name', fn ($row) => $row->full_name ?? 'N/A')
            ->addColumn('role', fn ($user) => "<span class='inline-flex items-center rounded-md bg-{$user->role_color}-50 px-2 py-1 text-xs font-medium text-{$user->role_color}-600 ring-1 ring-inset ring-{$user->role_color}-500/10/20'>".trans('enums.roles.'.$user?->getRoleNames()?->first()) ?? 'N/A'.'</span>')
            ->addColumn('action', fn ($user) => \view('data-table-action', compact('user'))->render())
            ->rawColumns(['action', 'role'])
            ->make(true);
    }
}
