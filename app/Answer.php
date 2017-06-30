<?php

namespace App;

class Answer extends SuperModel
{
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
