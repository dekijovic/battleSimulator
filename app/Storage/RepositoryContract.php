<?php
namespace App\Storage;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface RepositoryContract
{
    /**
     * @return Collection|null
     */
    public function all():? Collection;

    /**
     * @param int $id
     * @return Model|null
     */
    public function get(int $id);

    /**
     * @param $data
     * @return Model|null
     */
    public function store($data);

    /**
     * @param $data
     * @param int $id
     * @return Model|null
     */
    public function update($data, int $id);

    /**
     * @param int $id
     * @return Model|null
     */
    public function delete(int $id);

    /**
     * @return Builder|null
     */
    public function getQuery():? Builder;
}
