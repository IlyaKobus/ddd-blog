<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 02.08.2019
 * Time: 19:34
 */

namespace App\Infrastructure\Queries;

use App\Application\Exceptions\QueryInvalidArgumentException;
use Illuminate\Database\Query\Builder;

abstract class BaseQuery
{
    /**
     * @param array $params
     * @return Builder
     */
    public function execute(array $params): Builder
    {
        try {
            return static::query($params);
        } catch(\ErrorException $e) {
            throw new QueryInvalidArgumentException('Required query params not provided');
        }
    }

    abstract protected function query(array $params): Builder;
}