<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\User;
use App\Traits\DestroyUsers;

class UserController extends Controller
{

    use DestroyUsers;

    
	public function __construct()
	{
       // $this->middleware('can:update,user')->only(['edit', 'update']);
        $this->authorizeResource(User::class, 'user', ['except' => 'index']);
	}

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        return redirect()->route('accounts.index');
    }

	/**
     * Show the form for editing User.
     *
     * @param User $user
     * @return Response
     */
    public function edit(User $user)
    {

        return view('users.edit', compact('user'));
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
        
        return back()->with('success', trans('update-user-success'));
    }


}
