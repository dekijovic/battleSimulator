<?php

namespace App\Storage\Games;

use App\Storage\Armies\Army;
use App\Storage\Logs\Log;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Game
 *
 * @property Army[] $armies
 */
class Game extends Model
{
    protected $table = 'games';

    protected $fillable = [
        'name',
        'game_uuid',
        'status',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function armies(){
        return  $this->hasMany( Army::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function logs(){
        return  $this->hasMany( Log::class);
    }
}
