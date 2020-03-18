<?php
namespace App\Storage;


use App\Storage\Games\Game;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface GamesInterface
{
    /**
     * @return Collection|null
     */
    public function all():? Collection;

    /**
     * @param int $id
     * @return Game|null
     */
    public function get(int $id):? Game;

    /**
     * @param $data
     * @return Game|null
     */
    public function store($data):? Game;

    /**
     * @param $data
     * @param int $id
     * @return Game|null
     */
    public function update($data, int $id):? Game;

    /**
     * @param int $id
     * @return Game|null
     */
    public function delete(int $id):? Game;

    /**
     * @return Builder|null
     */
    public function getQuery():? Builder;
}
