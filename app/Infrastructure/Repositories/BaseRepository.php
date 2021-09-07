<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 02.08.2019
 * Time: 17:36
 */

namespace App\Infrastructure\Repositories;

use App\Infrastructure\Contracts\Repository as IRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

abstract class BaseRepository implements IRepository
{
    protected const DEFAULT_LIMIT_FACTOR = 10;

    /** @var string */
    protected $model;

    /**
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        return \DB::table($this->model)::create($data);
    }

    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update($id, $data)
    {
        return $this->find($id)->update($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->find($id)->delete();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $result = \DB::table($this->model)->find($id);

        if($result === null) {
            throw new ModelNotFoundException();
        }

        return $result;
    }
}
