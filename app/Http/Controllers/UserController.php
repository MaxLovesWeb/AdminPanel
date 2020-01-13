<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\User;
use App\Traits\DestroyUsers;
use App\Traits\UpdateUsers;
use App\Providers\RouteServiceProvider;

class UserController extends Controller
{

    use UpdateUsers, DestroyUsers;

    
	public function __construct()
	{
        $this->authorizeResource(User::class);
	}    

}
