<?php

namespace App\Http\Controllers;

use App\User;
use App\Roles;
use Illuminate\Http\Request;


class AdminUsersController extends Controller
{
  public function index()
  {
      //
      $users = User::all();
      
    return view('admin.users.index', compact('users'));
  }
}
