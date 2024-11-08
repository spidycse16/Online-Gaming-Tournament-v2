<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
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
        return redirect()->route('posts')->with('success', 'Post Added Successfully');
    } else {
        return redirect()->back()->with('error', 'Failed to add the post');
    }
}

    public function test()
    {
    }
}
