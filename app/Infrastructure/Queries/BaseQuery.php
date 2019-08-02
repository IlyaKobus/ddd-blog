<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 02.08.2019
 * Time: 19:34
 */

namespace App\Infrastructure\Queries;

use Illuminate\Database\Query\Builder;

abstract class BaseQuery
{
    /**
     * @param array $params
     * @return Builder
     */
    abstract public function execute(array $params): Builder;
}