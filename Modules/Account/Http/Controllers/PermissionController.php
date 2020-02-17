<?php

namespace Modules\Account\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Modules\Account\Entities\Permission;

use Modules\Account\Events\Permission\PermissionSyncRelations;
use Modules\Account\Events\Permissions\PermissionEditing;
use Modules\Account\Events\Permissions\PermissionUpdated;
use Modules\Account\Events\Permissions\PermissionViewed;

use Modules\Account\Forms\Permissions\EditPermission;
use Modules\Account\Forms\Permissions\ShowPermission;
use Modules\Account\Forms\Roles\SyncRoles;
use Modules\Account\Forms\Users\SyncUsers;

use Modules\Account\Tables\Roles\RoleDatatable;
use Modules\Account\Tables\Users\UserDatatable;
use Modules\Account\Tables\Permissions\PermissionDatatable;

use Modules\Account\Http\Requests\PermissionFormRequest;
use Modules\Account\Http\Requests\SyncRelationFormRequest;
use Kris\LaravelFormBuilder\FormBuilderTrait;

class PermissionController extends Controller
{
    use FormBuilderTrait;

    /**
     * PermissionController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->authorizeResource(Permission::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @param PermissionDatatable $permissionTable
     * @return \Illuminate\View\View
     * @throws \Exception
     */
    public function index(PermissionDatatable $permissionTable)
    {
        $datatables = [
            'permissions' => $permissionTable->html()->ajax([
                'url' => route('datatables.permissions.index')
            ]),
        ];

        return view('permission::index', compact( 'datatables'));
    }

    /**
     * Display the specified resource.
     *
     * @param Permission $permission
     * @param RoleDatatable $roleTable
     * @param UserDatatable $userTable
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission, RoleDatatable $roleTable, UserDatatable $userTable)
    {
        $form = $this->form(ShowPermission::class, [
            'model' => $permission
        ]);

        $datatables = [
            'roles' => $roleTable->html()->ajax([
                'url' => route('datatables.permissions.roles', $permission)
            ]),
            'users' => $userTable->html()->ajax([
                'url' => route('datatables.permissions.users', $permission)
            ]),
        ];

        event(new PermissionViewed($permission));

        return view('permission::show', compact('permission', 'form', 'datatables'));
    }

    /**
     * Show the forms for editing Permission.
     *
     * @param Permission $permission
     * @param RoleDatatable $roleTable
     * @param UserDatatable $userTable
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission, RoleDatatable $roleTable, UserDatatable $userTable)
    {
        $forms = [
            'permissions' => $this->form(EditPermission::class, [
                'method' => 'PUT',
                'url' => route('permissions.update', $permission),
                'model' => $permission
            ]),
            'syncRoles' => $this->form(SyncRoles::class, [
                'model' => $permission,
                'method' => 'PUT',
                'url' => route('permissions.syncRelation', $permission),
            ]),
            'syncUsers' => $this->form(SyncUsers::class, [
                'model' => $permission,
                'method' => 'PUT',
                'url' => route('permissions.syncRelation', $permission),
            ]),
        ];

        $datatables = [
            'roles' => $roleTable->html()->ajax([
                'url' => route('datatables.permissions.roles', $permission)
            ]),
            'users' => $userTable->html()->ajax([
                'url' => route('datatables.permissions.users', $permission)
            ]),
        ];

        event(new PermissionEditing($permission));

        return view('permission::edit', compact('permission', 'forms', 'datatables'));
    }

    /**
     * Update Permission.
     * @param Permission $permission
     * @param PermissionFormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(Permission $permission, PermissionFormRequest $request)
    {
        $permission->fill($request->validated())->save();

        flash(trans('update-permission-success'))->success()->important();

        event(new PermissionUpdated($permission));

        return redirect()->route('permissions.edit', $permission);
    }

    /**
     * Sync Permission Relations.
     * @param Permission $permission
     * @param SyncRelationFormRequest $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function syncRelation(Permission $permission, SyncRelationFormRequest $request)
    {
        $relation = $request->get('relation');
        $ids = $request->get('ids', []);

        $permission->getRelationBuilder($relation)->sync($ids);

        flash(trans('sync-relation-success'))->success()->important();

        event(new PermissionSyncRelations($permission));

        return redirect()->route('permissions.edit', $permission);
    }

}
