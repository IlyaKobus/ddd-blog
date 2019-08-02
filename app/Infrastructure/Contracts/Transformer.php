<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 02.08.2019
 * Time: 17:29
 */

namespace App\Infrastructure\Contracts;

interface Transformer
{
    public function transform($data);
}