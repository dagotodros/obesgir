<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Sms extends Model
{

    protected $table = 'sms';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number_a', 'number_b', 'sum', 'verified'
    ];

}
