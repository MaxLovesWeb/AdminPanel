@extends('account::layouts.master')

@section('content')


	<div class="row">

		<div class="col-12">

			<div class="card card-primary card-outline">
				<div class="card-header">
					<h3 class="card-title">
						<i class="fas fa-edit"></i>
						{{ __('Edit User')}}

					</h3>
				</div>
				<div class="card-body">



					<div class="row">
						<div class="col-4">
							<ul class="nav nav-tabs" id="user-data-content-below-tab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="tabs-user-tab" data-toggle="pill" href="#tabs-user" role="tab" aria-controls="tabs-user" aria-selected="true">User</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="tabs-sync-roles-tab" data-toggle="pill" href="#tabs-sync-roles" role="tab" aria-controls="tabs-sync-roles" aria-selected="false">Sync Roles</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="tabs-sync-permissions-tab" data-toggle="pill" href="#tabs-sync-permissions" role="tab" aria-controls="tabs-sync-permissions" aria-selected="false">Sync Permissions</a>
								</li>
							</ul>

							<div class="tab-content" id="user-data-content-below-tabContent">
								<div class="tab-pane text-left fade show active" id="tabs-user" role="tabpanel" aria-labelledby="tabs-user-tab">
									<div class="card-body">
										{!! form($forms['user']) !!}
									</div>
								</div>
								<div class="tab-pane fade" id="tabs-sync-roles" role="tabpanel" aria-labelledby="tabs-sync-roles-tab">
									<div class="card-body">
										{!! form($forms['syncRoles']) !!}
									</div>
								</div>
								<div class="tab-pane fade" id="tabs-sync-permissions" role="tabpanel" aria-labelledby="tabs-sync-permissions-tab">
									<div class="card-body">
										{!! form($forms['syncPermissions']) !!}
									</div>
								</div>
							</div>
						</div>
						<div class="col-8">

							<ul class="nav nav-tabs" id="roles-permissions-content-below-tab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="tabs-roles-tab" data-toggle="pill" href="#tabs-roles" role="tab" aria-controls="tabs-roles" aria-selected="false">Roles</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="tabs-permissions-tab" data-toggle="pill" href="#tabs-permissions" role="tab" aria-controls="tabs-permissions" aria-selected="true">Permissions</a>
								</li>
							</ul>

							<div class="tab-content" id="roles-permissionss-content-below-tabContent">
								<div class="tab-pane text-left fade show active" id="tabs-roles" role="tabpanel" aria-labelledby="tabs-roles-tab">
									<div class="card-body">
										@datatable(['builder' => $datatables['roles']])
									</div>
								</div>
								<div class="tab-pane text-left fade " id="tabs-permissions" role="tabpanel" aria-labelledby="tabs-permissions-tab">

									<div class="card-body">
										@datatable(['builder' => $datatables['permissions']])
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div><!-- /.card -->
		</div>
	</div>


@endsection

