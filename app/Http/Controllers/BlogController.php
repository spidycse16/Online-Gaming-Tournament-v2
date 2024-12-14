<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Tournament;
use Illuminate\Http\Request;
use Auth;

class BlogController extends Controller
{
    public function home()
    {
        $user=Auth::id();
        $user_name=User::where('id',$user)->pluck('name');
        $recentPosts = Post::latest()->take(8)->get();
        return view('users.blog.home',compact('recentPosts','user_name'));
    }

    public function addPost()
    {
        return view('users.blog.addPost');
    }

    public function postControl(Request $request)
{
    $user = Auth::id();
    $validated_data = $request->validate([
        'title' => 'string|required',
        'description' => 'string|required',
        'image' => 'image|max:2048'
    ]);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        
        $image->move(public_path('images/'), $imageName);
        $validated_data['image'] = 'images/' . $imageName;
    }

    $result = Post::create([
        'title' => $validated_data['title'],
        'description' => $validated_data['description'],
        'image' => $validated_data['image'] ?? null, // Handle cases where there’s no image
        'user_id' => $user,
    ]);

    if ($result) {
        return redirect()->route('blog')->with('success', 'Post Added Successfully');
    } else {
        return redirect()->back()->with('error', 'Failed to add the post');
    }
}

public function postDetails($postId)
{
    $post = Post::findOrFail($postId);
    $user_name = auth()->user()->name; // Or retrieve the username in the way that suits your logic
    $commentCount = $post->comments()->count(); // Get the number of comments for this post

    return view('users.blog.singlePost', compact('post', 'user_name', 'commentCount'));
}


public function likePost(Request $request)
{
    $validated = $request->validate([
        'post_id' => 'required|exists:posts,id',
    ]);

    $post = Post::findOrFail($validated['post_id']);
    $user = auth()->user();

    $alreadyLiked = $post->likes()->where('user_id', $user->id)->exists();

    if ($alreadyLiked) {
        $post->likes()->detach($user->id);
        $post->decrement('likes');
        return response()->json(['liked' => false, 'likes' => $post->likes]);
    }

    $post->likes()->attach($user->id);
    $post->increment('likes');
    return response()->json(['liked' => true, 'likes' => $post->likes]);
}

public function addComment(Request $request)
{
    // Validate the request
    $request->validate([
        'post_id' => 'required|exists:posts,id',
        'comment' => 'required|string|max:500',
    ]);

    // Create the comment
    $comment = new Comment();
    $comment->post_id = $request->post_id;
    $comment->user_id = auth()->id();
    $comment->comment = $request->comment;
    $comment->save();

    return response()->json([
        'user_name' => auth()->user()->name,
        'comment' => $comment->comment,
        'created_at' => $comment->created_at->diffForHumans(),
    ]);
}

public function getComments($postId)
{
   
    $comments = Comment::where('post_id', $postId)
        ->with('user') 
        ->get();

 
    return response()->json([
        'comments' => $comments->map(function ($comment) {
            return [
                'user_name' => $comment->user->name,  
                'comment' => $comment->comment,     
                'created_at' => $comment->created_at->toFormattedDateString(),
            ];
        }),
    ]);
}


    public function test()
    {
    }
}
