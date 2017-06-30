<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class RegistrationController extends Controller
{
    //
    public function create()
    {
        if (auth()->user()){
            return redirect('/play');
        }
        return view('register');

    }

    public function store()
    {

        // validate the form
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        //create and save the user
        // $user = User::create(request(['name', 'email', 'password']));

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        //sign them in
        auth()->login($user);

        return redirect('play');
    }
}
