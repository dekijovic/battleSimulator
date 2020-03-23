<?php


namespace App\Commands\Armies;


use App\Storage\Armies\Army;
use App\Storage\Armies\ArmyInterface;

class UpdateArmy
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
    public function __construct(array $data, int $id)
    {
        $this->data = $data;
        $this->id = $id;
    }

    /**
     * @param ArmyInterface $repo
     * @return Army|null
     */
    public function handle(ArmyInterface $repo):? Army
    {
        return $repo->update($this->data, $this->id);
    }
}
