<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 02.08.2019
 * Time: 17:10
 */

namespace App\Infrastructure\Transformers;

use App\Application\Exceptions\TransformerInvalidArgumentException;
use App\Application\Exceptions\TransformerDataNotProvidedException;
use Illuminate\Support\Collection;
use App\Infrastructure\Contracts\Transformer as ITransformer;

abstract class Transformer implements ITransformer
{
    protected $data;

    /**
     * Transformer constructor.
     * @param null $data
     */
    public function __construct($data = null)
    {
        $this->data = $data;
    }


    /**
     * @param null $data
     * @return array|mixed
     */
    public function transform($data = null)
    {
        $this->data = $data;

        if (null === $this->data) {
            throw new TransformerDataNotProvidedException();
        }

        if ($data instanceof Collection) {
            return $this->transformCollection($data);
        } else if (is_object($data)) {
            return $this->transformInstance($data);
        }

        throw new TransformerInvalidArgumentException('Wrong data type provided to transformer');
    }

    /**
     * @param object $data
     * @return array
     */
    abstract protected function transformInstance(object $data): array;

    /**
     * @param Collection $data
     * @return array
     */
    abstract protected function transformCollection(Collection $data): array;
}