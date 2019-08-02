<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 02.08.2019
 * Time: 17:40
 */

namespace App\Domain\Blog\Repositories;

use App\Domain\Blog\Queries\ArticlesByCategory;
use App\Infrastructure\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository
{
    protected $model = 'categories';

    /**
     * @param $id
     * @param int $offset
     * @param int $limit
     * @return mixed
     */
    public function articles($id, $offset = 0, $limit = self::DEFAULT_LIMIT_FACTOR)
    {
        /** @var ArticlesByCategory $query */
        $query = app(ArticlesByCategory::class);

        return $query->execute(['id' => $id])->limit($limit ?? self::DEFAULT_LIMIT_FACTOR)
            ->offset($offset)
            ->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function totalArticles($id)
    {
        /** @var ArticlesByCategory $query */
        $query = app(ArticlesByCategory::class);

        return $query->execute(['id' => $id])->count();
    }
}