<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LiveAnswersController extends Controller
{
    //

    //first delete the previous entries
    //then create new ones
    public function thisAnswerWasAnswered($id)
    {
        $item = \App\LiveAnswers::findOrFail($id);
        $item->guessed = true;
        $item->save();

        return redirect('/play');
    }

    public function destroyAndNew()
    {
        $user_id = auth()->user()->id;

        \App\Guess::where('user_id', $user_id)->delete();

        \App\LiveAnswers::where('user_id', $user_id)->delete();
        $getFive = \App\Answer::all()->random(5);
        foreach ($getFive as $eachOne){
            \App\LiveAnswers::create([
                'user_id' => $user_id,
                'answer_id' => $eachOne->id,
                'a0' => $eachOne->a0,
                'a1' => $eachOne->a1,
                'a2' => $eachOne->a2,
                'a3' => $eachOne->a3,
                'guessed' => false
            ]);
        }

        return redirect('play');
    }

}
