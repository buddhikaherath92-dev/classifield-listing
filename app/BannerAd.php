<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BannerAd extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'page',
        'location',
        'img',
        'expire_date',
        'is_active'
    ];
}
