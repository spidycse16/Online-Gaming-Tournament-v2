<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Recent Posts</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/post.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<header>
    <h1>Recent Blog Posts</h1>
    <a href="/add-post" class="add-post-button">+ Add Post</a>
</header>

<div class="container">
    @foreach ($recentPosts as $post)
        <div class="post-card" data-post-id="{{ $post->id }}">
            <!-- Display Post Image -->
            <img src="{{ $post->image }}" alt="Post Image" class="post-image" />

            <h2>{{ $post->title }}</h2>
            <div class="post-info">
                Posted by {{ $user_name }} on {{ $post->created_at->format('F d, Y') }}
            </div>
            <p class="post-description">{{ Str::limit($post->description, 150, '...') }}
                <a href="/posts/{{ $post->id }}" class="see-more">See More</a>
            </p>

            <div class="post-actions">
                <!-- Like Button with AJAX -->
                <button class="like-button">
                    <img src="{{ asset('images/like.png') }}" alt="like" class="image">
                    <span class="like-count">{{ $post->likes }}</span> Like
                </button>

                <!-- Comment Button -->
                <a href="/posts/{{ $post->id }}" class="comment-button">
                    <img src="{{ asset('images/comment.jpg') }}" alt="comment" class="image">
                    Comment
                </a>
            </div>
        </div>
    @endforeach
</div>

<script>
    $(document).ready(function () {
        $('.like-button').click(function () {
            const button = $(this);
            const postCard = button.closest('.post-card');
            const postId = postCard.data('post-id');

            $.ajax({
                url: '/like-post',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // CSRF token for Laravel
                },
                data: { post_id: postId },
                success: function (response) {
                    // Update like count and button text/icon
                    if (response.isLiked) {
                        button.find('.like-count').text(response.likes);
                        button.addClass('liked'); // Optional: Add a class for visual feedback
                    } else {
                        button.find('.like-count').text(response.likes);
                        button.removeClass('liked'); // Optional: Remove class if unliked
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });
    });
</script>

</body>
</html>
