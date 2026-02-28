<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Symfony\Component\Yaml\Yaml;
use App\Models\Category;
use App\Models\User;



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

// Route::get('/', function () {

//     $files = File::files(resource_path('posts'));
//     $posts = collect($files)
//         ->map(function ($file) {
//             $Document = YamlFrontMatter::parseFile($file);

//             return new Post(
//                 $Document->title,
//                 $Document->slug,
//                 $Document->excerpt,
//                 $Document->date,
//                 $Document->body()
//             );
//         });
//     return view('posts', [
//         'posts' => $posts
//     ]);
// });

Route::get('/', function () {
    return view('posts', [
        // n +1問題に対応するため、with
        'posts' => Post::latest()->with('category', 'author')->get()
    ]);
});


Route::get('/posts/{post:slug}', function (Post $post) {

    // find a post by slug  and pass it to the view callde post

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
});

Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts->load('category', 'author')
    ]);
});


Route::get('authors/{author:username}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts->load('category', 'author')
    ]);
});
