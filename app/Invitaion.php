<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitaion extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'token',
    ];




}
