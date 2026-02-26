<x-layout>


    <article>
        <h1><?= $post->title ?></h1>
        <?= $post->body ?>
    </article>

    <a href="categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>

    <a href="/">
        <button>Back</button>
    </a>

</x-layout>