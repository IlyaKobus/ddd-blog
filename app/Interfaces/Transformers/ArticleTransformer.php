<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 02.08.2019
 * Time: 17:09
 */

namespace App\Interfaces\Transformers;

use App\Infrastructure\Transformers\Transformer as TransformerAbstract;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class ArticleTransformer extends TransformerAbstract
{
    /**
     * @param object $data
     * @return array
     */
    protected function transformInstance(object $data): array
    {
        return [
            'subject' => ucfirst($data->subject),
            'body' => htmlspecialchars($data->body),
            'creationTime' => Carbon::create((string) $data->created_at)->format('d.m.Y H:i'),
        ];
    }

    /**
     * @param Collection $data
     * @return array
     */
    protected function transformCollection(Collection $data): array
    {
        return $data->map(
            (function (object $item) {
                return $this->transformInstance($item);
            })->bindTo($this)
        )->toArray();
    }
}
