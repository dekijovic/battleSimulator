<?php


namespace App\Commands\Games;


use App\Storage\ArmyInterface;
use App\Storage\GamesInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateGame implements ShouldQueue
{

    /** @var array */
    private $data;

    /**
     * CreateGame constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @param GamesInterface $repo
     * @return \App\Storage\Games\Army|null
     */
    public function handle(GamesInterface $repo)
    {
        $this->data['game_id'] = '123534263546345646';
        return $repo->store($this->data);
    }
}
