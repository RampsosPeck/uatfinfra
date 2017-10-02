<?php

namespace Uatfinfra\Http\Controllers;

use Uatfinfra\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
    public function index()
    {
    	$users = User::all();
    	return view('automotives.admin.users.index',compact('users'));
    }
}
