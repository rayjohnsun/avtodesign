<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
	public function index()
	{
		dd('User account');
	}

	public function ads()
	{
		dd('user ads');
	}
	
	public function message()
	{
		dd('user messages');
	}
}
