<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Recent Posts</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/post.css')}}">
</head>
<body>

<header>
    <h1>Recent Blog Posts</h1>
    <a href="/add-post" class="add-post-button">+ Add Post</a>
</header>

<div class="container">
    <!-- Displaying Recent Posts -->
    @foreach ($recentPosts as $post)
        <div class="post-card">
            <h2>{{ $post->title }}</h2>
            <div class="post-info">
                Posted by {{ $user_name }} on {{ $post->created_at->format('F d, Y') }}
            </div>
            <p class="post-description">{{ Str::limit($post->description, 150, '...') }}
                <a href="/posts/{{ $post->id }}" class="see-more">See More</a>
            </p>

            <div class="post-actions">
                <a href="/post-like-control" class="like-button">
                    <img src="{{asset('images/like.png')}}" alt="like" class="image">
                    <p class="like-count">{{ $post->likes }}</p> Like
                </a>

                <a href="/posts/{{ $post->id }}" class="comment-button">
                    <img src="{{asset('images/comment.jpg')}}" alt="comment" class="image">
                    Comment
                </a>
            </div>
        </div>
    @endforeach
</div>

</body>
</html>
