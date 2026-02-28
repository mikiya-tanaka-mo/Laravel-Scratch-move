<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'body',
        'excerpt',
        'slug',
        'category_id',
    ];

    protected $guarded = [
        'id',
    ];

    //! 全てのルートにおいて、category author を1度で読み込むために必要
    // これがないと、n+1問題が発生する
    // or web.phpにて 'posts' => $author->posts->load('category', 'author')を記載する必要がある

    protected $with = ['category', 'author'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
