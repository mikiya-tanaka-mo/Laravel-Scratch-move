<?php

namespace App\Models;

use PhpParser\Node\Expr\AssignOp\Mod;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;



class Post
{

    public $title;
    public $slug;
    public $excerpt;
    public $date;
    public $body;

    public function __construct($title, $slug, $excerpt, $date, $body)
    {
        $this->title = $title;
        $this->slug = $slug;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
    }

    public static function all()
    {
        return collect(File::files(resource_path('posts')))
            ->map(function ($file) {

                $document = YamlFrontMatter::parseFile($file);

                return new Post(
                    $document->title,
                    $document->slug,
                    $document->excerpt,
                    $document->date,
                    $document->body()
                );
            });
    }



    public static function find($slug)


    {
        return static::all()->firstWhere('slug', $slug);
    }



    // !Debag
    // public static function find($slug)
    // {
    //     $post = static::all()->firstWhere('slug', $slug);

    //     dd($post);

    //     return $post;
    // }
}






 // $path = __DIR__ . "/../resources/posts/{$slug}.html";

    // if (! file_exists($path)) {
    //     abort(404);
    // }

    // cache()->remember("posts.{$slug}", now()->addMinutes(20), function () use ($path) {
    //     return file_get_contents($path);
    // });

    // $post = file_get_contents($path);

    // return view(
    //     'post',
    //     [
    //         'post' => $post
    //     ]
    // );
