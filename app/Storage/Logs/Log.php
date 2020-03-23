<?php

namespace App\Storage\Logs;

use App\Storage\Armies\Army;
use App\Storage\Games\Game;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Log
 *
 * @property Game $game
 */
class Log extends Model
{
    protected $table = 'logs';

    protected $fillable = [
        'log',
        'game_id',
        'turn'
    ];
    protected $casts = [
        'log' => 'array',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function game(){
        return  $this->belongsTo( Game::class);
    }
}
