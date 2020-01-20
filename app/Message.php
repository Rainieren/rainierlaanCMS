<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'title', 'message'
    ];
}
