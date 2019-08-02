<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 02.08.2019
 * Time: 17:37
 */

namespace App\Domain\Blog\Repositories;

use App\Infrastructure\Repositories\BaseRepository;

class ArticleRepository extends BaseRepository
{
    protected $model = 'articles';
}