<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function index() {

      return view('users.index')->with('users', User::all());

    }

    public function edit() {

      return view('users.edit')->with('users', auth()->user());

    }

    public function makeAdmin(User $user) {

      $user->role = 'admin';

      $user->save();

      session()->flash('success','User changed to an Admin successfully');

      return redirect( route('users.index'));

    }

    public function editProfile(User $user) {

      $user->role = 'admin';

      $user->save();

      session()->flash('success','User changed to an Admin successfully');

      return redirect( route('users.index'));

    }

    public function updateProfile(UpdateProfileRequest $request, User $user) {

      $user = auth()->user();

      $user->update ([
      'name' => $request-name,
      'about' => $request-about

      ]);

      session()->flash('success','User profile changed successfully');

      return redirect()->back();

    }
}
