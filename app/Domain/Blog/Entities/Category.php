<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 02.08.2019
 * Time: 17:24
 */

namespace App\Domain\Blog\Entities;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}