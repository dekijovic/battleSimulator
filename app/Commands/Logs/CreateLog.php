<?php


namespace App\Commands\Logs;

use App\Storage\Logs\Log;
use App\Storage\Logs\LogInterface;

class CreateLog
{

    /** @var array */
    private $data;

    /**
     * CreateGame constructor.
     * @param array $data
     * @param int $gameId
     */
    public function __construct(array $data, int $gameId)
    {
        $this->data = $data;
        $this->data['game_id'] =  $gameId;
    }

    /**
     * @param LogInterface $repo
     * @return Log|null
     */
    public function handle(LogInterface $repo):? Log
    {
        return $repo->store($this->data);
    }
}
