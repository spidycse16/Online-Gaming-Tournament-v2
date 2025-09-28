@extends('layouts.layout')

@section('title', 'Blog - Recent Posts')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center my-4">
        <h1>Recent Blog Posts</h1>
        <a href="/add-post" class="btn btn-primary">+ Add Post</a>
    </div>

    <div class="row">
        @foreach ($recentPosts as $post)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <img src="{{ $post->image }}" class="card-img-top" alt="Post Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text"><small class="text-muted">Posted by {{ $user_name }} on {{ $post->created_at->format('F d, Y') }}</small></p>
                        <p class="card-text">{{ Str::limit($post->description, 150, '...') }}</p>
                        <a href="/posts/{{ $post->id }}" class="btn btn-link p-0">See More</a>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-light like-button" data-post-id="{{ $post->id }}">
                                <i class="far fa-thumbs-up"></i> <span class="like-count">{{ $post->likes }}</span> Like
                            </button>
                            <a href="/posts/{{ $post->id }}" class="btn btn-light">
                                <i class="far fa-comment"></i> Comment
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.like-button').click(function () {
            const button = $(this);
            const postId = button.data('post-id');

            $.ajax({
                url: '/like-post',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: { post_id: postId },
                success: function (response) {
                    button.find('.like-count').text(response.likes);
                    if (response.isLiked) {
                        button.addClass('liked');
                    } else {
                        button.removeClass('liked');
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });
    });
</script>
@endsection