<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/singlePost.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <div style="margin-left:180px; margin-top:10px;">
        @include('users.navbar')
    </div>
</head>
<body>
    <div class="post-container">
        <h2 class="post-title">{{ $post->title }}</h2>
        <img src="{{ asset($post->image) }}" alt="Post Image" class="post-image" />
        <p class="post-description">{{ $post->description }}</p>
        <p class="user-name">Posted by: {{ $user_name }}</p>

        <div class="post-actions">
            <button id="like-button" class="like-button">
                {{ auth()->user()->likedPosts()->where('post_id', $post->id)->exists() ? 'Unlike' : 'Like' }}
                (<span id="like-count">{{ $post->likes }}</span>)
            </button>
            <button id="comment-button">
                Comments ({{ $commentCount }}) 
            </button>
        </div>

        <div id="comments-section" class="hidden">
            <h3>Comments</h3>
            <ul id="comments-list">
            </ul>
            <input type="text" id="new-comment" placeholder="Write a comment..." />
            <button id="add-comment">Add Comment</button>
        </div>
    </div>

    <script>
        const commentButton = document.getElementById('comment-button');
        const commentsList = document.getElementById('comments-list');
        const newCommentInput = document.getElementById('new-comment');
        const postId = {{ $post->id }};
        const likeButton = document.getElementById('like-button');
        const likeText = document.getElementById('like-text');
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
                if (data.liked) {
                    likeButton.textContent = `Unlike (${data.likes})`;
                } else {
                    likeButton.textContent = `Like (${data.likes})`;
                }
                likeCount.textContent = data.likes;
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
        
        commentButton.addEventListener('click', () => {
            const commentsSection = document.getElementById('comments-section');
            commentsSection.classList.toggle('hidden');
            
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
                        commentElement.innerHTML = `<strong>${comment.user_name}</strong>: ${comment.comment} <small>(${comment.created_at})</small>`;
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
                    newCommentElement.innerHTML = `<strong>${data.user_name}</strong>: ${data.comment} <small>(${data.created_at})</small>`;
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
</body>
</html>
