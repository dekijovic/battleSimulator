<?php

namespace App\Storage\Armies;

use App\Storage\Games\Game;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Army
 *
 * @property Game $game
 */
class Army extends Model
{
    protected $table = 'armies';

    protected $fillable = [
        'name',
        'units',
        'game_id',
        'strategy',
        'winner'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function game(){
       return  $this->belongsTo( Game::class);
    }
}
