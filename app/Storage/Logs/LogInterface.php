<?php
namespace App\Storage\Logs;

use App\Storage\Logs\Log;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

interface LogInterface
{
    /**
     * @param null $gameId
     * @return Collection|null
     */
    public function all($gameId = null):? Collection;

    /**
     * @param int $id
     * @return Log|null
     */
    public function get(int $id):? Log;

    /**
     * @param $data
     * @return Log|null
     */
    public function store($data):? Log;

    /**
     * @param $data
     * @param int $id
     * @return Log|null
     */
    public function update($data, int $id):? Log;

    /**
     * @param int $id
     * @return Log|null
     */
    public function delete(int $id):? Log;

    /**
     * @return Builder|null
     */
    public function getQuery():? Builder;
}
