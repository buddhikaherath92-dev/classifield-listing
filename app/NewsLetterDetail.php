<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsLetterDetail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected  $fillable = [
        'id',
        'newsletter_id',
        'advertisement_id'
    ];
}
