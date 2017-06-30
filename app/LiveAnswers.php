<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LiveAnswers extends SuperModel
{
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }
}
