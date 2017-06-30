<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    //
    // public function __construct()
    // {
    //     $this->middleware('guest', ['except' => 'destroy']);
    // }

    public function create()
    {
        if (auth()->user()){
            return redirect('/play');
        }
        return view('login');
    }

    public function store()
    {
        // Attempte to authenticate the user
        if (! auth()->attempt(request(['email', 'password']))) {
            return back()->withErrors([
                'message' => 'Please check your credentials'
            ]);
        }

        // return redirect()->home();
        return redirect('startagame');
    }

    public function destroy()
    {
        if (! auth()->user()){
            return redirect('/login');
        }

        auth()->logout();

        // return redirect()->home();
        return view('loggedout');
    }
}
