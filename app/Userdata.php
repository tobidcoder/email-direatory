<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userdata extends Model
{
    //
    protected $fillable = [
        'email',
        'surname',
        'first_name',       
    ];
}
