<?php

namespace Modules\Account\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Account\Entities\Permission;
use Modules\Account\Entities\Role;
use Modules\Account\Entities\User;
use Modules\Account\Events\Permissions\PermissionUpdated;
use Modules\Account\Events\Roles\RoleEditing;
use Modules\Account\Events\Users\UserDeleted;
use Modules\Account\Events\Users\UserDeleting;
use Modules\Account\Events\Users\UserEditing;
use Modules\Account\Events\Users\UserSyncRelations;
use Modules\Account\Events\Users\UserUpdated;
use Modules\Account\Events\Users\UserViewed;
use Modules\Account\Forms\Roles\EditRole;
use Modules\Account\Forms\Roles\SyncRoles;
use Modules\Account\Forms\Users\EditUser;
use Modules\Account\Forms\Users\ShowUser;

use Modules\Account\Forms\Permissions\SyncPermissions;
use Modules\Account\Http\Requests\PermissionFormRequest;
use Modules\Account\Http\Requests\SyncRelationFormRequest;
use Modules\Account\Http\Requests\UserFormRequest;
use Kris\LaravelFormBuilder\FormBuilderTrait;


use Modules\Account\Tables\Roles\RoleDatatable;
use Modules\Account\Tables\Users\UserDatatable;
use Modules\Account\Tables\Permissions\PermissionDatatable;
use Modules\Addresses\Tables\AddressDatatable;

class UserController extends Controller
{
    use FormBuilderTrait;

    /**
     * UserController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->authorizeResource(User::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @param UserDatatable $userTable
     * @param RoleDatatable $roleTable
     * @param PermissionDatatable $permissionTable
     * @return \Illuminate\View\View
     * @throws \Exception
     */
    public function index(UserDatatable $userTable, RoleDatatable $roleTable, PermissionDatatable $permissionTable)
    {
        $datatables = [
            'users' => $userTable->html()->ajax([
                'url' => route('datatables.users.index')
            ]),
            'roles' => $roleTable->html()->ajax([
                'url' => route('datatables.roles.index')
            ]),
            'permissions' => $permissionTable->html()->ajax([
                'url' => route('datatables.permissions.index')
            ]),
        ];

        return view('user::index', compact( 'datatables'));
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @param RoleDatatable $roleTable
     * @param PermissionDatatable $permissionTable
     * @param AddressDatatable $addressDatatable
     * @return \Illuminate\Http\Response
     */
    public function show(User $user,
                         RoleDatatable $roleTable,
                         PermissionDatatable $permissionTable,
                         AddressDatatable $addressDatatable)
    {
        $form = $this->form(ShowUser::class, [
            'model' => $user
        ]);

        $datatables = [
            'roles' => $roleTable->html()->ajax([
                'url' => route('datatables.users.roles', $user)
            ]),
            'permissions' => $permissionTable->html()->ajax([
                'url' => route('datatables.users.permissions', $user)
            ]),
            'addresses' => $addressDatatable->html()->ajax([
                'url' => route('datatables.users.addresses', $user)
            ]),
        ];

        event(new UserViewed($user));

        return view('user::show', compact('user', 'form', 'datatables'));
    }

    /**
     * Show the form for editing User.
     *
     * @param User $user
     * @param RoleDatatable $roleTable
     * @param PermissionDatatable $permissionTable
     * @param AddressDatatable $addressDatatable
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user,
                         RoleDatatable $roleTable,
                         PermissionDatatable $permissionTable,
                         AddressDatatable $addressDatatable)
    {
        $forms = [
            'user' => $this->form(EditUser::class, [
                'model' => $user,
                'method' => 'PUT',
                'url' => route('users.update', $user),
            ]),
            'syncPermissions' => $this->form(SyncPermissions::class, [
                'model' => $user,
                'method' => 'PUT',
                'url' => route('users.syncRelation', $user),
            ]),
            'syncRoles' => $this->form(SyncRoles::class, [
                'model' => $user,
                'method' => 'PUT',
                'url' => route('users.syncRelation', $user),
            ]),
        ];

        $datatables = [
            'roles' => $roleTable->html()->ajax([
                'url' => route('datatables.users.roles', $user)
            ]),
            'permissions' => $permissionTable->html()->ajax([
                'url' => route('datatables.users.permissions', $user)
            ]),
            'addresses' => $addressDatatable->html()->ajax([
                'url' => route('datatables.users.addresses', $user)
            ]),
        ];

        event(new UserEditing($user));

        return view('user::edit', compact('user', 'forms', 'datatables'));
    }

    /**
     * Update Permission.
     * @param User $user
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(User $user, Request $request)
    {
        $this->validate($request, ['name' => ['required', 'string']]);

        $user->fill($request->only('name'))->save();

        flash(trans('update-user-success'))->success()->important();

        event(new UserUpdated($user));

        return redirect()->route('users.edit', $user);
    }

    /**
     * Sync Permission Relations.
     * @param User $user
     * @param SyncRelationFormRequest $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function syncRelation(User $user, SyncRelationFormRequest $request)
    {
        $relation = $request->get('relation');
        $ids = $request->get('ids', []);

        $user->getRelationBuilder($relation)->sync($ids);

        flash(trans('sync-relation-success'))->success()->important();

        event(new UserSyncRelations($user));

        return redirect()->route('users.edit', $user);
    }

    /**
     * Remove the specified resource from storage.
     * @param User $user
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(User $user, Request $request)
    {
        event(new UserDeleting($user));

        $user->delete();

        flash(trans('delete-user-success'))->success()->important();

        event(new UserDeleted);

        return redirect()->route('users.index');
    }

}
