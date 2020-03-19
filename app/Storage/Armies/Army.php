<?php

namespace App\Storage\Armies;

use Illuminate\Database\Eloquent\Model;

class Army extends Model
{
    protected $table = 'armies';

    protected $fillable = [
        'name',
        'units',
        'game_id',
        'strategy'
    ];
}
