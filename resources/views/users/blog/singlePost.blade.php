@extends('layouts.layout')

@section('title', $post->title)

@section('content')
<div class="container my-4">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card">
                <img src="{{ asset($post->image) }}" class="card-img-top" alt="Post Image">
                <div class="card-body">
                    <h1 class="card-title">{{ $post->title }}</h1>
                    <p class="card-text"><small class="text-muted">Posted by: {{ $user_name }}</small></p>
                    <p class="card-text">{{ $post->description }}</p>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <div>
                        <button id="like-button" class="btn btn-primary">
                            <i class="far fa-thumbs-up"></i> 
                            {{ auth()->user()->likedPosts()->where('post_id', $post->id)->exists() ? 'Unlike' : 'Like' }} 
                            (<span id="like-count">{{ $post->likes }}</span>)
                        </button>
                        <button id="comment-button" class="btn btn-secondary">
                            <i class="far fa-comment"></i> Comments ({{ $commentCount }})
                        </button>
                    </div>
                </div>
            </div>

            <div id="comments-section" class="mt-4 d-none">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Comments</h3>
                        <ul id="comments-list" class="list-group list-group-flush">
                        </ul>
                        <div class="mt-3">
                            <div class="input-group">
                                <input type="text" id="new-comment" class="form-control" placeholder="Write a comment...">
                                <button id="add-comment" class="btn btn-primary">Add Comment</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const commentButton = document.getElementById('comment-button');
    const commentsSection = document.getElementById('comments-section');
    const commentsList = document.getElementById('comments-list');
    const newCommentInput = document.getElementById('new-comment');
    const postId = {{ $post->id }};
    const likeButton = document.getElementById('like-button');
    const likeCount = document.getElementById('like-count');

    likeButton.addEventListener('click', () => {
        fetch('/like-post', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({ post_id: postId }),
        })
        .then(response => response.json())
        .then(data => {
            likeButton.innerHTML = `<i class="far fa-thumbs-up"></i> ${data.liked ? 'Unlike' : 'Like'} (<span id="like-count">${data.likes}</span>)`;
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });

    commentButton.addEventListener('click', () => {
        commentsSection.classList.toggle('d-none');
        if (commentsList.children.length === 0) {
            fetchComments();
        }
    });

    function fetchComments() {
        fetch(`/get-comments/${postId}`)
            .then(response => response.json())
            .then(data => {
                data.comments.forEach(comment => {
                    const commentElement = document.createElement('li');
                    commentElement.classList.add('list-group-item');
                    commentElement.innerHTML = `<strong>${comment.user_name}</strong>: ${comment.comment} <br> <small class="text-muted">${comment.created_at}</small>`;
                    commentsList.appendChild(commentElement);
                });
            })
            .catch(error => console.error('Error fetching comments:', error));
    }

    document.getElementById('add-comment').addEventListener('click', () => {
        const comment = newCommentInput.value;
        if (comment) {
            fetch('/add-comment', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ post_id: postId, comment: comment }),
            })
            .then(response => response.json())
            .then(data => {
                const newCommentElement = document.createElement('li');
                newCommentElement.classList.add('list-group-item');
                newCommentElement.innerHTML = `<strong>${data.user_name}</strong>: ${data.comment} <br> <small class="text-muted">${data.created_at}</small>`;
                commentsList.appendChild(newCommentElement);

                const commentCountElement = document.getElementById('comment-button');
                const currentCount = parseInt(commentCountElement.textContent.match(/\d+/)[0]);
                commentCountElement.textContent = `Comments (${currentCount + 1})`;

                newCommentInput.value = '';
            })
            .catch(error => console.error('Error adding comment:', error));
        }
    });
</script>
@endsection