<?php


namespace App\Commands\Games;


use App\Storage\Games\Game;
use App\Storage\GamesInterface;

class RestartGame
{
    /** @var array */
    private $data;

    /** @var int */
    private $id;

    /**
     * CreateGame constructor.
     * @param array $data
     * @param int $id
     */
    public function __construct(int $id, array $data)
    {
        $this->data = $data;
        $this->id = $id;
    }

    /**
     * @param GamesInterface $repo
     * @return Game|null
     */
    public function handle(GamesInterface $repo):? Game
    {
        $game = $repo->update($this->data, $this->id);
        $game->logs()->delete();
        $game->armies()->update(['winner' => false]);
        return $game->fresh()->load(['logs', 'armies']);
    }
}
