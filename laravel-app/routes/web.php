<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Symfony\Component\Yaml\Yaml;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $files = File::files(resource_path('posts'));



    $posts = collect($files)
        ->map(function ($file) {


            $Document = YamlFrontMatter::parseFile($file);

            return new Post(
                $Document->title,
                $Document->slug,
                $Document->excerpt,
                $Document->date,
                $Document->body()
            );
        });


    return view('posts', [
        'posts' => $posts
    ]);
});


Route::get('/posts/{slug}', function ($slug) {

    // find a post by slug  and pass it to the view callde post
    $post = Post::find($slug);

    return view('post', [
        'post' => $post
    ]);


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
})->where('slug', '[A-z0-9\-]+');
