<?php

namespace App\Http\Controllers;
use App\Models\Cocbase;
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
        $validatedData=$request->validate([
            'title'=>'required|string|',
            'image'=>'required|max:4096',
            'description'=>'required|string'
        ]);
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
        ]);
        if($flag)
        {
            return redirect()->route('addBase')->with('success','Base Added Successfully');
        }
    }
}