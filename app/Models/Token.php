<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Token extends Model
{

    protected $table = 'tokens';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'token', 'token_expire', 'refresh_token', 'refresh_token_expire'
    ];

}
