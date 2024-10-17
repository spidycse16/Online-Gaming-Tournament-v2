<?php

namespace App\Http\Controllers;
use App\Models\Tournament;

use App\Models\User_in_tournament;
use Faker\Provider\ar_EG\Payment;
use Illuminate\Http\Request;
use Validator;
use Auth;

class TournamentController extends Controller
{
    public function homePage()
    {
        $id=Auth::id();
        return view('users.home',['id'=>$id]);
    }
    public function allTournaments()
    {
        $tournaments=Tournament::paginate(4);
        
        return view('users.all_tournament',compact('tournaments'));
    }
    public function showDetails($id)
    {
        $tournament=Tournament::findOrFail($id);
        return view('users.tournament_details',['normal_route'=>true],compact('tournament'));
        
        
    }
    public function confirmPayment($id)
    {
        $tournament=Tournament::findOrFail($id);
        return view('users.confirmPayment',compact('tournament'));
    }
    public function notDone($id)
{
    return redirect()->route('confirmPayment', ['id' => $id])->with('success', 'Please confirm your payment');
}

    public function paymentDone($tournament_id)
    {
        $id=Auth::id();
        $record = User_in_tournament::where('user_id', $id)
            ->where('tournament_id', $tournament_id)
            ->first();
            if(isset($record))
            {
                return redirect()->route('tournaments')->with('alreadyJoined','You already joined the tournament.');
            }
            else
            {
                $numberOfUsers=Tournament::where('id',$tournament_id)->pluck('players_joined')->first();
                $maxPlayersInTournament=Tournament::where('id',$tournament_id)->pluck('player_number')->first();
                if($numberOfUsers<$maxPlayersInTournament)
                {
                    User_in_tournament::create([
                        'user_id'=>$id,
                        'tournament_id'=>$tournament_id
                    ]);
                    Tournament::where('id', $tournament_id)->update(['players_joined' => $numberOfUsers + 1]);
                }
                else
                {
                    return redirect()->route('tournaments')->with('nospace','The tournament is full!');
                }
            } 
        return redirect()->route('myTournaments',['id'=>$id])->with('success','Payment is successful');
    }
    public function myTournaments($id)
    {
        $matches_id=User_in_tournament::where('user_id',$id)->pluck('tournament_id');
        $matches=Tournament::whereIn('id',$matches_id)->paginate(4);
        
        return view('users.myTournaments',compact('matches'));
    }
    public function details($id)
    {
        $tournament=Tournament::find($id);
        return view('users.singleDetails',compact('tournament'));
    }
}
