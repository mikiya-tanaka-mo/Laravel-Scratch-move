<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /*************  ✨ Windsurf Command ⭐  *************/
    /**
     * Get the posts that belong to this category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    /*******  67216ff7-98dd-4aa7-b47d-d316fded8bba  *******/
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
