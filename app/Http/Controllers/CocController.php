<?php

namespace App\Http\Controllers;
use App\Models\Cocbase;
use App\Models\Like;
use Auth;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;

class CocController extends Controller
{
    public function manage()
    {
        return view('admin.clashofclans.manage');
    }
    public function add()
    {
        return view('admin.clashofclans.addPage');
    }
    public function addControl(Request $request)
    {
        //return $request;
        $validatedData=$request->validate([
            'title'=>'required|string|',
            'image'=>'required|max:4096',
            'description'=>'required|string',
            'th_level'=>'required|',
            'tags'=>'required',
            'link'=>'required'
        ]);
        $validatedData['tags'] = implode(',', $validatedData['tags']);
        if($request->hasFile('image'))
        {
            $image=$request->file('image');
            $imageName=time().$image->getClientOriginalName();
            $image->move(public_path('images'),$imageName);
            $validatedData['image_path']='images/'.$imageName;
        }
        $flag=Cocbase::create([
            'title'=>$validatedData['title'],
            'image'=>$validatedData['image_path'],
            'description'=>$validatedData['description'],
            'views'=>0,
            'likes'=>0,
            'downloads'=>0,
            'th_level'=>$validatedData['th_level'],
            'tags'=>$validatedData['tags'],
            'link'=>$validatedData['link'],
        ]);
        if($flag)
        {
            return redirect()->route('addBase')->with('success','Base Added Successfully');
        }
        else
        {
            echo "Something is wrong";
        }
    }

    public function cocBase()
    {
        $bases=Cocbase::paginate(16);
        return view('users.clashofclans.cocbase',compact('bases'));
    }
    public function likesControl($baseId)
    {
        $user=Auth::id();
        $entry=Like::where('user_id',$user)->where('base_id',$baseId)->exists();
        if($entry)
        {
            return redirect()->back();
        }
        else
        {  
            Like::create([
                'user_id'=>$user,
                'base_id'=>$baseId,

            ]);
            $base=Cocbase::findOrFail($baseId);
            $base->increment('likes');
            return redirect()->back();
        }
    }
    public function baseDetails($id)
    {
        $base=Cocbase::findOrFail($id);
        $base->increment('views');
        
        return view('users.clashofclans.baseDetails',compact('base'));
    }

    public function downloadControl($baseId)
    {
        $base=Cocbase::findOrFail($baseId);
        $base->increment('downloads');
        $link = $base->link;
        if (!preg_match("~^(http|https)~", $link)) {
        $link = "https://" . $link;
    }

    return redirect()->away($link);
    }
}
