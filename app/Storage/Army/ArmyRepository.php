<?php
namespace App\Storage\Games;


use App\Storage\ArmyInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ArmyRepository implements ArmyInterface
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
     * @return Army|null
     */
    public function get(int $id): ?Army
    {
        return $this->getQuery()->find($id)->get();
    }

    /**
     * @param array $data
     * @return Model|null
     */
    public function store($data): ?Army
    {

        $result = $this->getQuery()->create($data);

        return $result;
    }

    /**
     * @param $data
     * @param int $id
     * @return Army|null
     */
    public function update($data, int $id): ?Army
    {
        if($model = $this->get($id)){
             $model->update($data);
        };
        return $model;
    }

    /**
     * @param int $id
     * @return Army|null
     * @throws \Exception
     */
    public function delete(int $id): ?Army
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
        return Army::query();
    }
}
