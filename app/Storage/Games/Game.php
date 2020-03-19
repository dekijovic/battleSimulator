<?php

namespace App\Storage\Games;

use App\Storage\Armies\Army;
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
        return  $this->hasMany( Game::class);
    }
}
