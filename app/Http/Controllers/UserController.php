<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Traits\CreateUsers;
use App\Traits\ReadUsers;
use App\Traits\UpdateUsers;
use App\Traits\DestroyUsers;

use App\Tables\UserDatatable;
use App\Http\Resources\UserDatatableResource;

class UserController extends Controller
{

    //users crud actions
    use CreateUsers, ReadUsers, UpdateUsers, DestroyUsers;

	public function __construct()
	{
        $this->authorizeResource(User::class);
	}

    /**
     * Display a listing of the resource.
     * @param UserDatatable $datatable
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(UserDatatable $datatable, Request $request)
    {
        if($request->wantsJson()){

            $users = User::all();

            $data = UserDatatableResource::collection($users);

            return $datatable->with('data', $data)->ajax();
        }

        $table = [
            'route' => route('users.index', $request->query()),
            'columns' => $datatable->columns(),
        ];

        return view('users.index', compact('table'));
    }

    /**
     * Display the specified resource.
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $form = $this->buildShowUserForm($user);

        return $this->userViewed($user) ?: 
                        view('users.show', compact('user', 'form'));
    }

    /**
     * Show the user's update form.
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $userForm = $this->buildUpdateUserForm($user);

        return view('users.edit', compact('user', 'userForm'));
    }

    /**
     * Update the specified resource in storage.
     *  
     * @param User $user
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:users,name,'.$user->id, 
            'email' => 'required|unique:users,email,'.$user->id, 
            'password' => 'password', //'password:web'
        ]);

        $user->update($request->only('name', 'email'));

        flash(trans('update-user-success'))->success();

        return $this->userUpdated($user) ?: redirect('users.edit', $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = $this->buildCreateUserForm();

        return view('users.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $account = $this->createAccount($request->user(), $request->validated());

        return $this->accountCreated($account, $request) 
                        ?: redirect()->route('accounts.edit', $account);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $account
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Request $request)
    {
        $this->validate($request, [
            'email' => 'required|in:'.$user->email, 
            'password' => 'password', //'password:web'
        ]);

        $user->delete();

        flash(trans('delete-user-success'))->success();

        return $this->userDeleted() ?: redirect('users.index');
    }

}
