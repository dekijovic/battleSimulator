<?php

namespace App\Storage\Games;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table = 'games';

    protected $fillable = [
        'name',
        'game_id'
    ];
}
