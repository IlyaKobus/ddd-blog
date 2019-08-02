<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 02.08.2019
 * Time: 17:33
 */

namespace App\Infrastructure\Contracts;

interface Repository
{
    public function create($data);

    public function update($id, $data);

    public function delete($id);

    public function find($id);
}