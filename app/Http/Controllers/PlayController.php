<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayController extends Controller
{
    //
    // public function __construct()
    // {
    //     // $this->middleware('auth')->except(['index', 'show']);
    //     $this->middleware('auth');
    // }

    public function playGet()
    {
        if (auth()->user()){
            //check for a win
            //if answers exist, but they're all guessed
            //display the win page
            $allLiveAnswers = \App\LiveAnswers::where('user_id', auth()->user()->id)->get();
            if ($allLiveAnswers->count() > 0){
                // if all answers have been guessed
                // display the win page (this is the same code below. Refactor for DRY)

                // if ($allLiveAnswers->where('guessed', '1')->count() == $allLiveAnswers->count()){
                //     $liveAnswers = \App\LiveAnswers::where('user_id', '1')->get();
                //     $answers = [];
                //     for ($counter = 0; $counter < count($liveAnswers); $counter++){
                //         $answers[$counter] = \App\Answer::find($liveAnswers[$counter]->answer_id);
                //     }
                //
                //     return view('winner', compact('answers'));
                // }

                if ($allLiveAnswers->where('guessed', '1')->count() == $allLiveAnswers->count()){
                    $answers = [];
                    for ($counter = 0; $counter < count($allLiveAnswers); $counter++){
                        $answers[$counter] = \App\Answer::find($allLiveAnswers[$counter]->answer_id);
                    }

                    return view('winner', compact('answers'));
                }
            }

            // if there are 0 liveAnswers, the game hasn't been started yet
            if ($allLiveAnswers->count() == 0){

                return redirect('/nogamestarted');
            }
            // else if, answers don't exist
            //go to a start new game

            $guesses = \App\Guess::where('user_id', auth()->user()->id)->get();

            return view('play', compact('guesses'));
        }

        return redirect('/login');

    }

    public function playPost()
    {
        if (! auth()->user()){
            return redirect('/login');
        }

        $g0 = request('g0');
        $g1 = request('g1');
        $g2 = request('g2');
        $g3 = request('g3');



        $this->validate(request(), [
            'g0' => 'regex:/^[RGBCYMrgbcym]$/',
            'g1' => 'regex:/^[RGBCYMrgbcym]$/',
            'g2' => 'regex:/^[RGBCYMrgbcym]$/',
            'g3' => 'regex:/^[RGBCYMrgbcym]$/'
        ]);

        $theUserId = auth()->user()->id;

        $guessAsAnswer = \App\LiveAnswers::where('user_id', $theUserId)->where('a0', $g0)->where('a1', $g1)->where('a2', $g2)->where('a3', $g3)->where('guessed', 'false')->get();
        $thisGuessNumAnswers = $guessAsAnswer->count();

        $htmlRep = "";

        if (! $thisGuessNumAnswers > 0){
            //this guess isn't an answer


            //first determine if it's the right color and right spot
            $howManyAt0 = \App\LiveAnswers::where('user_id', $theUserId)->where('a0', $g0)->where('guessed', 'false')->count();
            $howManyAt1 = \App\LiveAnswers::where('user_id', $theUserId)->where('a1', $g1)->where('guessed', 'false')->count();
            $howManyAt2 = \App\LiveAnswers::where('user_id', $theUserId)->where('a2', $g2)->where('guessed', 'false')->count();
            $howManyAt3 = \App\LiveAnswers::where('user_id', $theUserId)->where('a3', $g3)->where('guessed', 'false')->count();

            // $clue0 = "";
            // $clue1 = "";
            // $clue2 = "";
            // $clue3 = "";

            if ($howManyAt0 == 0){
                //count up all this color on the other spots
                $first = \App\LiveAnswers::where('user_id', $theUserId)->where('a1', $g0)->where('guessed', 'false')->count();
                $second = \App\LiveAnswers::where('user_id', $theUserId)->where('a2', $g0)->where('guessed', 'false')->count();
                $third = \App\LiveAnswers::where('user_id', $theUserId)->where('a3', $g0)->where('guessed', 'false')->count();
                $clue0 = $first + $second + $third;
                $clue0 = strval($clue0) . "?";
            } else {
                $clue0 = $howManyAt0;
                $clue0 = strval($clue0) . "!";
            }

            if ($howManyAt1 == 0){
                //count up all this color on the other spots
                $first = \App\LiveAnswers::where('user_id', $theUserId)->where('a0', $g1)->where('guessed', 'false')->count();
                $second = \App\LiveAnswers::where('user_id', $theUserId)->where('a2', $g1)->where('guessed', 'false')->count();
                $third = \App\LiveAnswers::where('user_id', $theUserId)->where('a3', $g1)->where('guessed', 'false')->count();
                $clue1 = $first + $second + $third;
                $clue1 = strval($clue1) . "?";
            } else {
                $clue1 = $howManyAt1;
                $clue1 = strval($clue1) . "!";
            }

            if ($howManyAt2 == 0){
                //count up all this color on the other spots
                $first = \App\LiveAnswers::where('user_id', $theUserId)->where('a0', $g2)->where('guessed', 'false')->count();
                $second = \App\LiveAnswers::where('user_id', $theUserId)->where('a1', $g2)->where('guessed', 'false')->count();
                $third = \App\LiveAnswers::where('user_id', $theUserId)->where('a3', $g2)->where('guessed', 'false')->count();
                $clue2 = $first + $second + $third;
                $clue2 = strval($clue2) . "?";
            } else {
                $clue2 = $howManyAt2;
                $clue2 = strval($clue2) . "!";
            }

            if ($howManyAt3 == 0){
                //count up all this color on the other spots
                $first = \App\LiveAnswers::where('user_id', $theUserId)->where('a0', $g3)->where('guessed', 'false')->count();
                $second = \App\LiveAnswers::where('user_id', $theUserId)->where('a1', $g3)->where('guessed', 'false')->count();
                $third = \App\LiveAnswers::where('user_id', $theUserId)->where('a2', $g3)->where('guessed', 'false')->count();
                $clue3 = $first + $second + $third;
                $clue3 = strval($clue3) . "?";
            } else {
                $clue3 = $howManyAt3;
                $clue3 = strval($clue3) . "!";
            }

            $first2 = \App\LiveAnswers::where('user_id', $theUserId)->where('a0', $g0)->where('a1', $g1)->where('guessed', 'false')->count();
            $first3 = \App\LiveAnswers::where('user_id', $theUserId)->where('a0', $g0)->where('a1', $g1)->where('a2', $g2)->where('guessed', 'false')->count();


            $htmlRep = "<span class='{$g0}'>{$g0}</span><span class='{$g1}'>{$g1}</span><span class='{$g2}'>{$g2}</span><span class='{$g3}'>{$g3}</span>|<span>{$clue0}|{$clue1}|{$clue2}|{$clue3}|{$first2}&{$first3}";
        } else {
            $htmlRep = "<span class='{$g0}'>{$g0}</span><span class='{$g1}'>{$g1}</span><span class='{$g2}'>{$g2}</span><span class='{$g3}'>{$g3}</span><span>WINNER</span>";
        }


        \App\Guess::create([
            'user_id' => $theUserId,
            'g0' => $g0,
            'g1' => $g1,
            'g2' => $g2,
            'g3' => $g3,
            'HTML_representation' => $htmlRep
        ]);



        $howManyAnswersLeft = \App\LiveAnswers::where('user_id', $theUserId)->where('guessed', 'false')->count();


        if ( $thisGuessNumAnswers > 0){
            // it is an answer, so update it's 'guessed' value to be 1/true

            //if it's the last one, no need to show it. just go to the win page
            if ($howManyAnswersLeft == 1){

                $liveAnswers = \App\LiveAnswers::where('user_id', '1')->get();
                $answers = [];
                for ($counter = 0; $counter < count($liveAnswers); $counter++){
                    $answers[$counter] = \App\Answer::find($liveAnswers[$counter]->answer_id);
                }

                //return view('winner', compact('answers'));
            }
            $answerID = $guessAsAnswer[0]->id;
            $redirectLink = '/answered/' . $answerID;
            return redirect($redirectLink);
        } else {
            return $this->playGet();
        }

    }
}
