<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use App\Models\User;
use App\Models\User_in_tournament;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function add()
    {
        return view('admin.addTournament');
    }
    public function storeValues(Request $request)
    {
        //return $request;
        $validatedData=$request->validate([
            'name'=>'string|required|max:200',
            'match_fee'=>'string|required',
            'datetime'=>'required',
            'game_name'=>'string|required',
            'player_number'=>'integer|max:32|required',
            'winning_amount'=>'required',
            'description'=>'string|required|max:500',
        ]);
        if($request->hasFile('image'))
        {
            $image=$request->file('image');
            $imageName=time().'.'. $image->getClientOriginalExtension();
            $image->move(public_path('images'),$imageName);
            $validatedData['image_path']='images/'.$imageName;
        }

        $result=Tournament::create([
            'tournament_name'=>$validatedData['name'],
            'match_fee'=>$validatedData['match_fee'],
            'date_time'=>$validatedData['datetime'],
            'game_name'=>$validatedData['game_name'],
            'player_number'=>$validatedData['player_number'],
            'winning_amount'=>$validatedData['winning_amount'],
            'image'=>$validatedData['image_path'],
            'players_joined'=>0,
            'description'=>$validatedData['description'],
        ]);
        if($result==true)
        {
            return redirect()->route('adminHome')->with('success','Tournament Added successfully');
        }
        return redirect()->back()->with('error', 'Failed to add Tournament');
    }

    public function search()
    {
        return view('admin.search_tournament');
    }

    public function manageVersus($tournament_id)
    {
        //need to send id and name
        $players_id=User_in_tournament::where('tournament_id',$tournament_id)-> pluck('user_id');
        $player_name=User::whereIn('id',$players_id)->pluck('name');
        $numberOfPlayers=User_in_tournament::where('tournament_id',$tournament_id)->count();
        return view('admin.versus',compact('player_name' ,'numberOfPlayers','tournament_id'));
    }
}
