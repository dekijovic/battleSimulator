<?php
namespace App\Storage\Games;


use App\Storage\GamesInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class GameRepository implements GamesInterface
{
    /**
     * @return Collection|null
     */
    public function all():? Collection
    {
        return $this->getQuery()->get();

    }

    /**
     * @param int $id
     * @return Game|null
     */
    public function get(int $id): ?Game
    {
        return $this->getQuery()->find($id);
    }

    /**
     * @param array $data
     * @return Game|null
     */
    public function store($data): ?Game
    {

        $result = $this->getQuery()->create($data);

        return $result;
    }

    /**
     * @param $data
     * @param int $id
     * @return Game|null
     */
    public function update($data, int $id): ?Game
    {
        if($model = $this->get($id)){
             $model->update($data);
        };
        return $model;
    }

    /**
     * @param int $id
     * @return Game|null
     * @throws \Exception
     */
    public function delete(int $id): ?Game
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
        return Game::query();
    }
}
