<?php


namespace App\Commands\Armies;


use App\Storage\ArmyInterface;

class CreateArmy
{

    /** @var array */
    private $data;

    /**
     * CreateGame constructor.
     * @param array $data
     */
    public function __construct(array $data, $gameId)
    {
        $this->data = $data;
        $this->data['game_id'] =  $gameId;
    }

    /**
     * @param ArmyInterface $repo
     * @return \App\Storage\Games\Army|null
     */
    public function handle(ArmyInterface $repo)
    {
        return $repo->store($this->data);
    }
}
