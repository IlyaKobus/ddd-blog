<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 02.08.2019
 * Time: 17:58
 */

namespace App\Application\Requests;

use App\Infrastructure\Requests\BaseFormRequest;

class ShowCategoryRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'offset' => 'integer',
            'limit' => 'integer',
        ];
    }

    public function authorize()
    {
        return true;
    }
}