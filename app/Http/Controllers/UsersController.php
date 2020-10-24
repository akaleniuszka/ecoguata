<?php

namespace App\Http\Controllers;

use Image;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    public function update_avatar(Request $request, User $user)
    {
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->save( public_path('/upload/avatars/' . $filename) );

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }

        $request->session()->flash('success', 'Usuario actualizado!');

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $keys = ['txtUserName', 'txtFirstName', 'txtLastName', 'txtEmail'];
        if ($request->hasAny($keys)) {
            $name = $request->get('txtUserName');
            $first_name = $request->get('txtFirstName');
            $last_name = $request->get('txtLastName');
            $email = $request->get('txtEmail');

            $user = Auth::user();
            $user->name = $name;
            $user->first_name = $first_name;
            $user->last_name = $last_name;
            $user->email = $email;
            $user->save();
        }

        $request->session()->flash('success', 'Usuario actualizado!');
        
        return view('users.edit', compact('user'));
    }
}
