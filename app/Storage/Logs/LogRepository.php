<?php
namespace App\Storage\Logs;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class LogRepository implements LogInterface
{
    /**
     * @param null $gameId
     * @return Collection|null
     */
    public function all($gameId = null):? Collection
    {
        $query = $this->getQuery();
        if($gameId){
            $query->where('game_id', $gameId);
        }
        return $query->get();

    }

    /**
     * @param int $id
     * @return Log|null
     */
    public function get(int $id): ?Log
    {
        return $this->getQuery()->find($id);
    }

    /**
     * @param array $data
     * @return Log|null
     */
    public function store($data): ?Log
    {

        $result = $this->getQuery()->create($data);

        return $result;
    }

    /**
     * @param $data
     * @param int $id
     * @return Log|null
     */
    public function update($data, int $id): ?Log
    {
        if($model = $this->get($id)){
             $model->update($data);
        };
        return $model;
    }

    /**
     * @param int $id
     * @return Log|null
     * @throws \Exception
     */
    public function delete(int $id): ?Log
    {
        if($model = $this->get($id)){
            $model->delete();
        };
        return $model;
    }

    /**
     * @return Builder|null
     */
    public function getQuery():? Builder
    {
        return Log::query();
    }
}
