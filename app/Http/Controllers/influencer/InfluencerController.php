<?php


namespace App\Http\Controllers\influencer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


use App\Companies;
use App\User;
use Illuminate\Http\Request;



class InfluencerController extends Controller
{

    public function show_profile($id)
    {
        $user = User::where('id', $id)->first();
        
        return view('influencer_dashboard.profile',compact("user"));
    }

}