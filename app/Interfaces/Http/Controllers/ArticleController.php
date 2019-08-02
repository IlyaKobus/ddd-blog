<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 02.08.2019
 * Time: 17:32
 */

namespace App\Interfaces\Http\Controllers;

use App\Domain\Blog\Repositories\ArticleRepository;
use App\Interfaces\Transformers\ArticleTransformer;

class ArticleController extends Controller
{
    /**
     * @var ArticleRepository
     */
    protected $article;

    /**
     * ArticleController constructor.
     * @param ArticleRepository $article
     */
    public function __construct(ArticleRepository $article)
    {
        $this->article = $article;
    }

    /**
     * @param $id
     * @param ArticleTransformer $transformer
     * @return array
     */
    public function show($id, ArticleTransformer $transformer)
    {
        return $transformer->transform($this->article->find($id));
    }
}