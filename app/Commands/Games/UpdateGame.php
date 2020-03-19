<?php


namespace App\Commands\Games;


use App\Storage\ArmyInterface;
use App\Storage\Games\Game;
use App\Storage\GamesInterface;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateGame
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
        return $repo->update($this->data, $this->id);
    }
}
