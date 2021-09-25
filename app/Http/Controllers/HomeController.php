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

    public function cadWithAuth( )
{
    $authCode = getenv('MY_AUTH');
    $authID = getenv('GOOGLE_CLIENT_ID');
    $authSecret = getenv('GOOGLE_CLIENT_SECRET');
    $client = new Client(); //GuzzleHttp\Client
    $result = $client->post('https://oauth.hostsite.com/oauth/token', [
        'form_params' => [
            'grant_type' => 'authorization_code',
            // 'code' => $authCode,
            'client id' => $authID,
            'client_secret' => $authSecret
        ]
    ]);

    return response()->json($result);
}

public function googleCallback(){
    $authObject  = new AuthenticateService;

    // $authUrl = $authObject->getLoginUrl('java12301230@gmail.com','UCN5-b5_3eCtjkBYqUICFeiw'); 
    $authUrl = $authObject->getAuthorizationUrl();

    dd($authUrl);
}
    public function getLoginUrl()
    {


        /*
        https://accounts.google.com/o/oauth2/v2/auth?
                scope=https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fyoutube.readonly&
                access_type=offline&
                include_granted_scopes=true&
                state=state_parameter_passthrough_value&
                redirect_uri=http://127.0.0.1:8000/login/google/callback&
                response_type=code&
                client_id=197179214595-1hicdi5vrnrq6m9pv0g297k36bjnctqe.apps.googleusercontent.com"
        return redirect('https://accounts.google.com/o/oauth2/v2/auth')
        ->with([
            "scope"=>"https://www.googleapis.com/auth/youtube.readonly",
            "access_type" => "offline",
         "include_granted_scopes" => "true",
        "state"=>"state_parameter_passthrough_value",
        "redirect_uri"=>"http://127.0.0.1:8000/login/google/callback",
                "response_type"=>"code",
                "client_id"=>"client_id"
        ])
        ->redirect();*/
//         $client = new Google_Client();
// $client->setAuthConfig('client_secret.json');
// $client->addScope(GOOGLE_SERVICE_YOUTUBE::YOUTUBE_FORCE_SSL);
// $client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/oauth2callback.php');
// // offline access will give you both an access and refresh token so that
// // your app can refresh the access token without user interaction.
// $client->setAccessType('offline');
// // Using "consent" ensures that your application always receives a refresh token.
// // If you are not using offline access, you can omit this.
// $client->setApprovalPrompt("consent");
// $client->setIncludeGrantedScopes(true);   // incremental auth


        $client  = new AuthenticateService;
        $client->addScope(GOOGLE_SERVICE_YOUTUBE::YOUTUBE_FORCE_SSL);
        $client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/oauth2callback.php');
        // offline access will give you both an access and refresh token so that
        // your app can refresh the access token without user interaction.
        $client->setAccessType('offline');
        // Using "consent" ensures that your application always receives a refresh token.
        // If you are not using offline access, you can omit this.
        $client->setApprovalPrompt("consent");
        $client->setIncludeGrantedScopes(true); 
        $auth_url = $client->createAuthUrl();
 
        // header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
        return redirect($auth_url);
    
        // $authUrl = $authObject->getLoginUrl('java12301230@gmail.com','UCN5-b5_3eCtjkBYqUICFeiw'); 
        // $authUrl = $authObject->getAuthorizationUrl();

        // dd($authUrl);
         // $code = $request->get('code');
        // $identifier = $request->get('state');

        //   dd($code);
        // return view('home');
        // return redirect(route('profile',['id'=>auth::user()->id]));

    }
    public function  fetchingAuthCodeAndIdentifier()
    { 
        // $code = Input::get('code');
        // $identifier = Input::get('state');
   
        $authObject  = new AuthenticateService;
        $authResponse = $authObject->authChannelWithCode($code);
        /*
        This will return an array:
        $authResponse['token'] (Channel Token)
        $authResponse['channel_details']
        $authResponse['live_streaming_status'] (enabled or disabled)

        You'll need the View ID displayed there.


                287085831
        */
        return $authResponse;
    }
    public  function youtubeCallback (Request $request) {
      
        $code = $request->code;
        $authObject  = new AuthenticateService;
        $authResponse = $authObject->authChannelWithCode($code);
       dd($authResponse ) ;

        // $authUrl = $authObject->getLoginUrl('java12301230@gmail.com','UCN5-b5_3eCtjkBYqUICFeiw'); 
        //   dd($authUrl);
        // $accessToken = $authObject->getToken($code);
        //   $response = (new \GuzzleHttp\Client)->post('http://127.0.0.1:8000/oauth/token', [
        //     'form_params' => [
        //         'grant_type' => 'authorization_code',
        //         'client_id' => '197179214595-1hicdi5vrnrq6m9pv0g297k36bjnctqe.apps.googleusercontent.com', // Replace with Client ID
        //         'client_secret' => '2urMSV6IHY8N5ktmHwhbVupf', // Replace with client secret
        //         'redirect_uri' => 'http://127.0.0.1:8000/login/google/callback',
        //         // 'code' => $_GET['code'],
        //          'code' =>$code,        
    
        //     ]
        // ]);
 
        // session()->put('token', json_decode((string) $response->getBody(), true));
    //  return $code;
 
    //  return redirect('/home');
    }
    public function redirectGoogle(Request $request)
    {
         $authID = getenv('GOOGLE_CLIENT_ID');
        $authSecret = getenv('GOOGLE_CLIENT_SECRET');
        $provider = new Google([
            'clientId'     => $authID,
            'clientSecret' => $authSecret,
            'redirectUri'  => 'https://example.com/oauth2/google',
        ]);
    
    if (empty($request->input('code'))) {
            // If we don't have an authorization code then get one
            $authUrl = $provider->getAuthorizationUrl();
            session(['oauth2state', $provider->getState()]);
            //Log::info('Storing provider state ' . session('oauth2state')); <-- Log entry exists so we know session value was written
            header('Location: ' . $authUrl);
            exit;
        } elseif (empty($request->input('state')) || ($request->input('state') !== session('oauth2state', false))) {
           // Log::error($request->input('state') . ' did not equal stored value ' . session('oauth2state', false)); <-- Log entry exists
            // State is invalid, possible CSRF attack in progress
            exit('Invalid state'); 
        } else {
            // Try to get an access token (using the authorization code grant)
            $token = $provider->getAccessToken('authorization_code', [
                'code' => $request->input('code')
            ]);
    
            // Optional: Now you have a token you can look up a users profile data
            try {
                // We got an access token, let's now get the owner details
                $ownerDetails = $provider->getResourceOwner($token);
    
                // Use these details to create a new profile
                dd('Hello %s!', $ownerDetails->getFirstName());
    
            } catch (Exception $e) {
                // Failed to get user details
                dd('Something went wrong: ' . $e->getMessage());
            }
    
            // Use this to interact with an API on the users behalf
            echo $token->getToken() . PHP_EOL;
    
            // Use this to get a new access token if the old one expires
            echo $token->getRefreshToken() . PHP_EOL;
    
            // Unix timestamp at which the access token expires
            echo $token->getExpires() . PHP_EOL;
            dd();
        }
    }

    public function  AnalyticsDetails()
    {
                //fetch the most visited pages for today and the past week
        Analytics::fetchMostVisitedPages(Period::days(7));

        //fetch visitors and page views for the past week
        Analytics::fetchVisitorsAndPageViews(Period::days(7));

        Analytics::getAnalyticsService();

                //retrieve visitors and pageview data for the current day and the last seven days
        $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(7));

        //retrieve visitors and pageviews since the 6 months ago
        $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::months(6));

        //retrieve sessions and pageviews with yearMonth dimension since 1 year ago
        $analyticsData = Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                'metrics' => 'ga:sessions, ga:pageviews',
                'dimensions' => 'ga:yearMonth'
            ]
        );
        $startDate = Carbon::now()->subYear();
        $endDate = Carbon::now();
        
        Period::create($startDate, $endDate);
        
            }
            
}