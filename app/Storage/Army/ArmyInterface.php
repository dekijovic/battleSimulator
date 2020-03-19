<?php
namespace App\Storage;


use App\Storage\Games\Army;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface ArmyInterface
{
    /**
     * @param null $gameId
     * @return Collection|null
     */
    public function all($gameId = null):? Collection;

    /**
     * @param int $id
     * @return Army|null
     */
    public function get(int $id):? Army;

    /**
     * @param $data
     * @return Army|null
     */
    public function store($data):? Army;

    /**
     * @param $data
     * @param int $id
     * @return Army|null
     */
    public function update($data, int $id):? Army;

    /**
     * @param int $id
     * @return Army|null
     */
    public function delete(int $id):? Army;

    /**
     * @return Builder|null
     */
    public function getQuery():? Builder;
}
