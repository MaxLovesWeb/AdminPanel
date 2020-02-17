<?php

namespace Modules\Account\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kris\LaravelFormBuilder\FormBuilderTrait;

use Modules\Account\Entities\Role;

use Modules\Account\Events\Roles\RoleCreated;
use Modules\Account\Events\Roles\RoleCreating;
use Modules\Account\Events\Roles\RoleDeleted;
use Modules\Account\Events\Roles\RoleDeleting;
use Modules\Account\Events\Roles\RoleEditing;
use Modules\Account\Events\Roles\RoleSyncRelations;
use Modules\Account\Events\Roles\RoleUpdated;
use Modules\Account\Events\Roles\RoleViewed;

use Modules\Account\Forms\Roles\CreateRole;
use Modules\Account\Forms\Roles\EditRole;
use Modules\Account\Forms\Roles\ShowRole;
use Modules\Account\Forms\Users\SyncUsers;
use Modules\Account\Forms\Permissions\SyncPermissions;

use Modules\Account\Http\Requests\RoleFormRequest;
use Modules\Account\Http\Requests\SyncRelationFormRequest;

use Modules\Account\Tables\Permissions\PermissionDatatable;
use Modules\Account\Tables\Roles\RoleDatatable;
use Modules\Account\Tables\Users\UserDatatable;


class RoleController extends Controller
{
    use FormBuilderTrait;

    /**
     * RoleController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->authorizeResource(Role::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @param RoleDatatable $roleTable
     * @return \Illuminate\View\View
     */
    public function index(RoleDatatable $roleTable)
    {
        $datatables = [
            'roles' => $roleTable->html()->ajax([
                'url' => route('datatables.roles.index')
            ]),
        ];

        return view('role::index', compact( 'datatables'));
    }

    /**
     * Display the specified resource.
     *
     * @param Role $role
     * @param UserDatatable $userTable
     * @param PermissionDatatable $permissionTable
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role, UserDatatable $userTable, PermissionDatatable $permissionTable)
    {
        $form = $this->form(ShowRole::class, [
            'model' => $role
        ]);

        $datatables = [
            'users' => $userTable->html()->ajax([
                'url' => route('datatables.roles.users', $role)
            ]),
            'permissions' => $permissionTable->html()->ajax([
                'url' => route('datatables.roles.permissions', $role)
            ]),
        ];

        event(new RoleViewed($role));

        return view('role::show', compact('role', 'form', 'datatables'));
    }

    /**
     * Show the form for editing Role.
     *
     * @param Role $role
     * @param UserDatatable $userTable
     * @param PermissionDatatable $permissionTable
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role, UserDatatable $userTable, PermissionDatatable $permissionTable)
    {
        $forms = [
            'role' => $this->form(EditRole::class, [
                'model' => $role,
                'method' => 'PUT',
                'url' => route('roles.update', $role),
            ]),
            'syncPermissions' => $this->form(SyncPermissions::class, [
                'model' => $role,
                'method' => 'PUT',
                'url' => route('roles.syncRelation', $role),
            ]),
            'syncUsers' => $this->form(SyncUsers::class, [
                'model' => $role,
                'method' => 'PUT',
                'url' => route('roles.syncRelation', $role),
            ]),
        ];

        $datatables = [
            'users' => $userTable->html()->ajax([
                'url' => route('datatables.roles.users', $role)
            ]),
            'permissions' => $permissionTable->html()->ajax([
                'url' => route('datatables.roles.permissions', $role)
            ]),
        ];

        event(new RoleEditing($role));

        return view('role::edit', compact('role', 'forms', 'datatables'));
    }

    /**
     * Update Role.
     *
     * @param Role $role
     * @param RoleFormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(Role $role, RoleFormRequest $request)
    {
        $role->fill($request->validated())->save();

        event(new RoleUpdated($role));

        flash(trans('update-role-success'))->success()->important();

        return redirect()->route('roles.edit', $role);
    }

    /**
     * Sync Role Relations.
     *
     * @param Role $role
     * @param SyncRelationFormRequest $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function syncRelation(Role $role, SyncRelationFormRequest $request)
    {
        $relation = $request->get('relation');
        $ids = $request->get('ids', []);

        $role->getRelationBuilder($relation)->sync($ids);

        event(new RoleSyncRelations($role));

        flash(trans('sync-relation-success'))->success()->important();

        return redirect()->route('roles.edit', $role);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param RoleDatatable $roleTable
     * @return \Illuminate\Http\Response
     */
    public function create(RoleDatatable $roleTable)
    {
        $forms = [
            'role' => $this->form(CreateRole::class, [
                'method' => 'POST',
                'url' => route('roles.store'),
            ]),
        ];

        $datatables = [
            'roles' => $roleTable->html()->ajax([
                'url' => route('datatables.roles.index')
            ]),
        ];

        event(new RoleCreating);

        return view('role::create', compact('forms', 'datatables'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  RoleFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleFormRequest $request)
    {
        $data = $request->validated();

        $role = Role::create([
            'slug' => $data['slug'],
            'name' => $data['name'],
            'description' => $data['description'],
        ]);

        event(new RoleCreated($role));

        flash(trans('create-role-success'))->success()->important();

        return redirect()->route('roles.edit', $role);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Role $role, Request $request)
    {
        event(new RoleDeleting($role));

        $role->delete();

        flash(trans('delete-role-success'))->success()->important();

        event(new RoleDeleted);

        return redirect()->route('roles.index');
    }

}
