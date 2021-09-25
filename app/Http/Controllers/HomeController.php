<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use  alchemyguy\YoutubeLaravelApi\AuthenticateService;
use alchemyguy\YoutubeLaravelApi\ChannelService;
use alchemyguy\YoutubeLaravelApi\VideoService;
 use Analytics;
use Spatie\Analytics\Period;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
     
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('layouts.dashboard');
    }

 
  
    public  function youtubeCallback (Request $request) {
      
        $code = $request->get('code');
        $authObject  = new AuthenticateService;
        $request->session()->forget('youtube_code');
        session(['youtube_code' => $code]);
        $code = $request->session()->get('youtube_code');
        $authResponse = $authObject->authChannelWithCode('4/0AX4XfWgaz73LQAuwOBwosHNPBJJfHf7Kj7Yvtnh3e0SAK9IoDAwVG04Qn8dml_XSWK3hzg');
        $authResponse = $authObject->authChannelWithCode($code);
        dd($authResponse ) ;

    }
    
    
            
}