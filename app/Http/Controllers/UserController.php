<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\User;
use App\Traits\DestroyUsers;
use App\Traits\UpdateUsers;
use App\Traits\ShowUsers;
use App\Providers\RouteServiceProvider;
use App\Tables\UserDatatable;
use App\Http\Resources\UserDatatableResource;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Forms\UserForm;

class UserController extends Controller
{

    use ShowUsers, UpdateUsers, DestroyUsers;

    
	public function __construct()
	{
        //$this->authorizeResource(User::class);
	}

	// accountController@index
    public function indexAction(UserDatatable $datatable, Request $request)
    {
        if($request->wantsJson()){

            $data = UserDatatableResource::collection(User::all());

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
     *
     * @param  User  $user
     * @param  FormBuilder $formBuilder
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, FormBuilder $formBuilder, Request $request)
    {
        $form = $this->buildShowUserForm($user, $formBuilder);

        return $this->userViewed($request) ?: 
                        view('users.show', compact('user', 'form'));
    }

    /**
     * Show the user's update form.
     * @param  User $user
     * @param  FormBuilder $formBuilder
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, FormBuilder $formBuilder)
    {
        $form = $this->buildUpdateUserForm($user, $formBuilder);

        return view('users.edit', compact('user', 'form'));
    }

    /**
     * Update the specified resource in storage.
     *  
     * @param User $user
     * @param Request $request
     * @return Response
     */
    public function update(User $user, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:users,name,'.$user->id, 
            'email' => 'required|unique:users,email,'.$user->id, 
            'password' => 'password', //'password:web'
        ]);

        $user->update($request->only('name', 'email'));

        return $this->userUpdated($request) ?:
                    redirect('users.edit')->with('success', trans('update-user-success'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $account
     * @param  Request  $request
     * @return Response
     */
    public function destroy(User $user, Request $request)
    {
        $this->validate($request, [
            'email' => 'required|in:'.$user->email, 
            'password' => 'password', //'password:web'
        ]);

        $user->delete();

        return $this->userDeleted($request) ?: 
                    redirect('users.index')->with('success', trans('delete-user-success'));
    }

}
