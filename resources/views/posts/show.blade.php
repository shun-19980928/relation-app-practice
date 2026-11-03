<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>{{ $post->title }}</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 20px;
        }

        .tag {
            display: inline-block;
            background-color: #eee;
            padding: 5px 10px;
            margin-right: 5px;
            border-radius: 4px;
            font-size: 12px;
        }

        .comment {
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 10px;
        }

        .comment small {
            color: #777;
        }
    </style>
</head>

<body>
    <h1>{{ $post->title }}</h1>

    <div>
        @foreach ($post->tags as $tag)
        <span class="tag">{{ $tag->name }}</span>
        @endforeach
    </div>

    <p>{{ $post->content }}</p>

    <h2>コメント（{{ $post->comments->count() }}件）</h2>

    @forelse ($post->comments as $comment)
    <div class="comment">
        <p>{{ $comment->body }}</p>
        <small>{{ $comment->created_at->format('Y/m/d H:i') }}</small>
    </div>
    @empty
    <p>コメントはまだありません。</p>
    @endforelse

    <p>
        <a href="{{ route('posts.index') }}">← 一覧に戻る</a>
    </p>
</body>

</html>