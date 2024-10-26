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
        // //need to send id and name
        // $players_id=User_in_tournament::where('tournament_id',$tournament_id)-> pluck('user_id');
        // $player_name=User::whereIn('id',$players_id)->pluck('name');
        // $rounds=User_in_tournament::where('tournament_id',$tournament_id)->pluck('rounds');
        // $numberOfPlayers=count($players_id);
        // //return $player_name;
        // return view('admin.versus',compact('player_name' , 'numberOfPlayers','tournament_id','players_id','rounds'));

        $players = User_in_tournament::where('tournament_id', $tournament_id)
    ->where('eliminated', false)
    ->with('user:id,name')
    ->get();

    $minRound = $players->min('rounds');

    $players = User_in_tournament::where('tournament_id', $tournament_id)
    ->where('eliminated', false)
    ->orderBy('rounds', 'asc')
    ->with('user:id,name')
    ->get();


    $roundPlayers = $players->groupBy('rounds');
    $numberOfPlayers = $players->count();
    return view('admin.versus', compact('roundPlayers', 'numberOfPlayers', 'tournament_id','minRound'));

    }

    public function manage(Request $request)
    {
       $title=$request->title;
       $results=Tournament::where('tournament_name','Like','%'.$title.'%')->get(['id','tournament_name']);
       //return $results;
       return view('admin.manage',compact('results'));
    }

       public function adminHome()
    {
        return view('admin.home');
    }


    public function deleteUser($delete_id,$winner_id,$tournament_id)
    {
        // $record = User_in_tournament::where('user_id', $delete_id)->first();
        // if ($record) {
        //     $record->delete();
        //     }
        // User_in_tournament::where('user_id',$increase_id)->increment('rounds');
        // Tournament::where('id',$tour_id)->decrement('players_joined');
        // return redirect()->back();

        User_in_tournament::where('tournament_id', $tournament_id)
        ->where('user_id', $delete_id)
        ->update(['eliminated' => true]);

    // Advance the winner to the next round
        $winner = User_in_tournament::where('tournament_id', $tournament_id)
        ->where('user_id', $winner_id)
        ->first();

    Tournament::where('id',$tournament_id)->decrement('players_joined');
    $winner->rounds+= 1;
    $winner->save();

    return redirect()->back();
    }

    public function editTournament($id)
    {
        $tournaments=Tournament::findOrFail($id);
        //return $tournaments;
        return view('admin.editPage', compact('tournaments'));
    }

    public function update(Request $request, $tournament_id)
    {
        $validatedData = $request->validate([
            'name' => 'string|required|max:200',
            'match_fee' => 'string|required',
            'datetime' => 'required|date', // Ensure this is a date
            'game_name' => 'string|required',
            'player_number' => 'integer|max:32|required',
            'winning_amount' => 'required|numeric', // Make sure this is numeric
            'description' => 'string|required|max:500',
            'image' => 'nullable|image|max:2048', // Allow image upload as optional
        ]);
    
        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $validatedData['image_path'] = 'images/' . $imageName; // Store the path
        } else {
            // If no new image, set image_path to current image to avoid overwriting
            $tournament = Tournament::findOrFail($tournament_id);
            $validatedData['image_path'] = $tournament->image; // Keep existing image
        }
    
        // Retrieve the tournament
        $tournament = Tournament::findOrFail($tournament_id);
    
        // Update the tournament record
        $updateData = $tournament->update([
            'tournament_name' => $validatedData['name'],
            'match_fee' => $validatedData['match_fee'],
            'game_name' => $validatedData['game_name'],
            'date_time' => $validatedData['datetime'],
            'player_number' => $validatedData['player_number'],
            'winning_amount' => $validatedData['winning_amount'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image_path'], // Ensure this key exists
        ]);
    
        // Check if the update was successful
        if ($updateData) {
            return redirect()->route('adminHome')->with('success','Update is successful');
        } else {
            return redirect()->back()->with('failed','Unable to update Tournament');
        }
    }
    
}
