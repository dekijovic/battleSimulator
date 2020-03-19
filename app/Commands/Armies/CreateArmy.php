<?php


namespace App\Commands\Armies;


use App\Storage\Armies\ArmyInterface;
use App\Storage\Armies\Army;

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
     * @return Army|null
     */
    public function handle(ArmyInterface $repo):? Army
    {
        return $repo->store($this->data);
    }
}
