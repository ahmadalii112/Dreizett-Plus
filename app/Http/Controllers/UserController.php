<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Service\RoleService;
use App\Http\Service\UserService;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    protected UserService $userService;

    protected RoleService $roleService;

    public function __construct(
        UserService $userService,
        RoleService $roleService
    ) {
        $this->userService = $userService;
        $this->roleService = $roleService;
    }

    /**
     * Display a listing of the resource.
     */
    /*    public function index(): View
        {
            $users = $this->userService->paginate(perPage: 10, with: ['roles']);

            return view('users.index', compact('users'));
        }*/
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::with('roles')->select('*');
            $tables = Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('full_name', fn ($row) => $row->full_name ?? 'N/A')
                ->addColumn('role', fn ($user) => "<span class='inline-flex items-center rounded-md bg-{$user->role_color}-50 px-2 py-1 text-xs font-medium text-{$user->role_color}-600 ring-1 ring-inset ring-{$user->role_color}-500/10/20'>".trans('enums.roles.'.$user?->getRoleNames()?->first()) ?? 'N/A'.'</span>')
                ->addColumn('action', fn ($user) => \view('data-table-action', compact('user'))->render())
                ->rawColumns(['action', 'role'])
                ->make(true);

            return $tables;
        }

        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $roles = $this->roleService->pluck(keyColumn: 'name');

        return view('users.create-edit-form', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request): RedirectResponse
    {
        $user = $this->userService->createUserWithRole(
            userData: $request->validated(),
            roleName: $request->get('role'),
        );

        return redirect()->route('users.index')
            ->with('notificationType', 'success')
            ->with('notificationMessage', trans('language.notifications.add', ['Name' => trans_choice('language.users.users', 2)]));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        $roles = $this->roleService->pluck(keyColumn: 'name');

        return view('users.create-edit-form', compact('roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user): RedirectResponse
    {
        // Get the validated data from the request
        $validatedData = $request->validated();

        // Check if the 'password' input is present and not empty
        if (! $request->filled('password')) {
            unset($validatedData['password']);
        }

        // Update the user's data
        $updatedUser = $this->userService->updateUserWithRole(
            user: $user,
            userData: $validatedData,
            roleName: $request->input('role')
        );

        return redirect()->route('users.index')->with('notificationType', 'info')->with('notificationMessage', trans('language.notifications.update', ['Name' => trans_choice('language.users.users', 2)]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        if ($this->userService->checkAdministration($user->id)) {
            return redirect()->route('users.index')->with('notificationType', 'danger')->with('notificationMessage', trans('language.notifications.danger'));
        }
        $this->userService->delete($user->id);

        return redirect()->route('users.index')->with('notificationType', 'info')->with('notificationMessage', trans('language.notifications.delete', ['Name' => trans_choice('language.users.users', 2)]));

    }
}
