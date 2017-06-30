<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnswerController extends Controller
{
    //
    // public function __construct()
    // {
    //     // $this->middleware('auth')->except(['index', 'show']);
    //     $this->middleware('auth');
    //
    //
    // }

    public function create()
    {
        if (! auth()->user()){
            return redirect('/login');
        }

        return view('create');
    }

    public function store()
    {

        if (! auth()->user()){
            return redirect('/login');
        }

        // do unique check on HTML representation


        $a0 = request('g0');
        $a1 = request('g1');
        $a2 = request('g2');
        $a3 = request('g3');

        $htmlRep = "<span class='{$a0}'>{$a0}</span><span class='{$a1}'>{$a1}</span><span class='{$a2}'>{$a2}</span><span class='{$a3}'>{$a3}</span>";
        $message = request('message');

        $this->validate(request(), [
            'g0' => 'regex:/^[RGBCYMrgbcym]$/',
            'g1' => 'regex:/^[RGBCYMrgbcym]$/',
            'g2' => 'regex:/^[RGBCYMrgbcym]$/',
            'g3' => 'regex:/^[RGBCYMrgbcym]$/',
            'message' => 'required'
        ]);

        $thisOne = \App\Answer::create([
            'user_id' => auth()->user()->id,
            'a0' => $a0,
            'a1' => $a1,
            'a2' => $a2,
            'a3' => $a3,
            'message' => request('message'),
            'HTML_representation' => $htmlRep
        ]);

        // $thisOne->id;

        return redirect('create-an-answer');


        // return redirect('create-an-answer');
    }
}
