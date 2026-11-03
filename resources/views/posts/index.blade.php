<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>投稿一覧</title>
</head>

<body>
    <h1>投稿一覧</h1>

    @if (request('tag'))
    <p>「{{ request('tag') }}」のタグが付いた投稿</p>
    <a href="{{ route('posts.index') }}">すべての投稿を表示</a>
    @endif

    @forelse ($posts as $post)
    <div style="border: 1px solid #ccc; padding: 15px; margin-bottom: 15px;">
        <h2>
            <a href="{{ route('posts.show', $post->id) }}">
                {{ $post->title }}
            </a>
        </h2>

        <p>{{ $post->content }}</p>

        <p>コメント：{{ $post->comments_count }}件</p>

        <p>タグ：
            @foreach ($post->tags as $tag)
            <a href="{{ route('posts.index', ['tag' => $tag->name]) }}">
                {{ $tag->name }}
            </a>
            @endforeach
        </p>
    </div>
    @empty
    <p>投稿がありません。</p>
    @endforelse
</body>

</html>