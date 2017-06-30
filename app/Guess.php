<?php

namespace App;

class Guess extends SuperModel
{
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
