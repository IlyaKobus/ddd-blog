<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 02.08.2019
 * Time: 19:33
 */

namespace App\Domain\Blog\Queries;

use App\Application\Exceptions\QueryInvalidArgumentException;
use App\Infrastructure\Queries\BaseQuery;
use Illuminate\Database\Query\Builder;

class ArticlesByCategory extends BaseQuery
{
    /**
     * @param array $params
     * @return Builder
     */
    public function query(array $params): Builder
    {
        return \DB::table('article_category')
            ->select('articles.*')
            ->join('categories', 'category_id', '=', 'categories.id')
            ->join('articles', 'article_id', '=', 'articles.id')
            ->where('category_id', $params['id']);
    }

}