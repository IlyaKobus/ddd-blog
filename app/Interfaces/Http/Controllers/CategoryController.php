<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 02.08.2019
 * Time: 17:32
 */

namespace App\Interfaces\Http\Controllers;

use App\Application\Requests\ShowCategoryRequest;
use App\Domain\Blog\Repositories\ArticleRepository;
use App\Domain\Blog\Repositories\CategoryRepository;
use App\Interfaces\Transformers\ArticleTransformer;
use App\Interfaces\Transformers\CategoryTransformer;
use Illuminate\Database\Eloquent\Collection;

class CategoryController extends Controller
{
    /**
     * @var CategoryRepository
     */
    protected $category;

    /**
     * @var
     */
    protected $article;

    /**
     * CategoryController constructor.
     * @param CategoryRepository $category
     * @param ArticleRepository $article
     */
    public function __construct(CategoryRepository $category, ArticleRepository $article)
    {
        $this->category = $category;
        $this->article = $article;
    }

    /**
     * @param $id
     * @param ShowCategoryRequest $request
     * @param CategoryTransformer $categoryTransformer
     * @param ArticleTransformer $articleTransformer
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(
        $id,
        ShowCategoryRequest $request,
        CategoryTransformer $categoryTransformer,
        ArticleTransformer $articleTransformer
    ) {
        /** @var Collection $articles */
        $articles = $this->category->articles(
            $id,
            $request->get('offset'),
            $request->get('limit')
        );

        return response()->json(
            [
                'category' => $categoryTransformer->transform($this->category->find($id)),
                'articles' => $articleTransformer->transform($articles),
                'total' => $this->category->totalArticles($id),
            ]
        );
    }
}