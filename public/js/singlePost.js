document.addEventListener('DOMContentLoaded', () => {
    let likeCount = 0;
    const likeButton = document.getElementById('like-button');
    const likeCountDisplay = document.getElementById('like-count');
    const commentButton = document.getElementById('comment-button');
    const commentsSection = document.getElementById('comments-section');
    const commentsList = document.getElementById('comments-list');
    const newCommentInput = document.getElementById('new-comment');
    const addCommentButton = document.getElementById('add-comment');

    // Toggle comments section
    commentButton.addEventListener('click', () => {
        commentsSection.classList.toggle('hidden');
    });

    // Like button functionality
    likeButton.addEventListener('click', () => {
        
    });

    // Add new comment
    addCommentButton.addEventListener('click', () => {
        const commentText = newCommentInput.value.trim();
        if (commentText !== "") {
            const commentItem = document.createElement('li');
            commentItem.textContent = commentText;
            commentsList.appendChild(commentItem);
            newCommentInput.value = ""; // Clear input field
        }
    });
});
