<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use GuzzleHttp\Client;
use Socialite;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


 
public function redirectToSnapchatProvider()

{
 $appId = "260e83ae-bb64-44cf-925f-d259692493c0";
$secret = "-Ya0tvL95rrIEye2O3bd8X9xYK5aNcDiZnmwwwZ5OfU";
$redirectUri = "https://localhost/Inflow/public/snapchat/callback";
// $appId = config('services.snapchat.client_id');
// $redirectUri = urlencode(config('services.snapchat.redirect'));
// return redirect()->to("https://accounts.snapchat.com/accounts/oauth2/auth?app_id=260e83ae-bb64-44cf-925f-d259692493c0&redirect_uri=".urlencode("https://localhost/Inflow/public/callback")."&scope=user_profile,user_media&response_type=code");
$state = md5(uniqid(rand(), true));
$additionalProviderConfig = ['scopeList' => array("https://auth.snapchat.com/oauth2/api/user.display_name",
"https://auth.snapchat.com/oauth2/api/user.bitmoji.avatar",
"https://auth.snapchat.com/oauth2/api/user.external_id"),    
        'response_type' => 'code',
        'state'=>$state,
];
$scopeList= array("https://auth.snapchat.com/oauth2/api/user.display_name",
                   "https://auth.snapchat.com/oauth2/api/user.bitmoji.avatar",
                   "https://auth.snapchat.com/oauth2/api/user.external_id"
);

$scopes = [
    'https://auth.snapchat.com/oauth2/api/user.display_name',
    'https://auth.snapchat.com/oauth2/api/user.bitmoji.avatar',
    'https://auth.snapchat.com/oauth2/api/user.external_id'
];

$state = md5(uniqid(rand(), true));
$code_verifier = "AdleUo9ZVcn0J7HkXOdzeqN6pWrW36K3JgVRwMW8BBQazEPV3kFnHyWIZi2jt9gA";
$code_challenge = hash("sha256",$code_verifier);

$query_params = [
    'response_type' => 'code',
    'redirect_uri' => config('services.snapchat.redirect'),
    'scope' => implode(' ',$scopes),
    'client_id' =>  config('services.snapchat.client_id'),
    'state' => $state,
    'code_challenge' => $code_challenge,
    'code_challenge_method' => 'S256'
];

// Return full URL
// return "https://accounts.snapchat.com/accounts/oauth2/auth?" . http_build_query($query_params);

// return redirect()->to("https://accounts.snapchat.com/accounts/oauth2/auth?app_id=230589115714459&redirect_uri=".urlencode("https://localhost/Inflow/public/callback")."&scope=implode(' ',$scopes)&response_type=code");
// return redirect()->to("https://accounts.snapchat.com/accounts/oauth2/auth?". http_build_query($query_params));

$config = new \SocialiteProviders\Manager\Config($appId, $secret, $redirectUri);
return Socialite::with('snapchat')->setConfig($config)->redirect();
// $client = new Client();
// // Get access token
// $response = $client->request('GET', 'https://accounts.snapchat.com/accounts/oauth2/auth', [
//     'form_params' => [
//         'client_id' => $appId,
//         'client_secret' => $secret,
//          'redirectUri' => $redirectUri,
//          'scopeList'=> ['https://auth.snapchat.com/oauth2/api/user.display_name',
//          'https://auth.snapchat.com/oauth2/api/user.bitmoji.avatar',
//          'https://auth.snapchat.com/oauth2/api/user.external_id'
//     ],
//              'response_type' =>'code',


//     ]
// ]);

}
public function snapchatProviderCallback(Request $request)
{
    

    $code = $request->code;
    $state= $request->state;
    if (empty($code)) return redirect()->route('home')->with('error', 'Failed to login with Snapchat.');
    $url="https://accounts.snapchat.com/accounts/oauth2/token";
    $appId = "260e83ae-bb64-44cf-925f-d259692493c0";
    $secret = "-Ya0tvL95rrIEye2O3bd8X9xYK5aNcDiZnmwwwZ5OfU";
    $redirectUri = "https://localhost/Inflow/public/snapchat/callback";
    $client = new Client();
     
$header = base64_encode($appId.":".$secret);
$payloaded_url=$url."?client_id=".$appId."&client_secret=".$secret."&grant_type=authorization_code&redirect_uri=".$redirectUri."&code=".$code;//."&code_verifier=".$code_verifier; 

$ch = curl_init($payloaded_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, 1);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type' => 'application/json',
     'Authorization'=> 'Basic '.$header
));


// execute!
$res = curl_exec($ch);

// close the connection, release resources used
curl_close($ch);

$response= json_decode($res);

$access_token=$response->access_token;

$res = $client->request('GET', 'https://kit.snapchat.com/v1/me?query={me{externalId displayName bitmoji{avatar id}}}', [
    'headers' => [
        'Content-Type' => 'application/json',
        'Authorization' => 'Bearer '.$access_token,
    ],
    
]);
$content = $res->getBody()->getContents();
$oAuth = json_decode($content);
// dd($oAuth->data->me->displayName);

   // Get Snapchat user name 
$username = $oAuth->data->me->displayName;
return $username;


}

public function redirectToInstagramProvider()
{
    $appId = config('services.instagram.client_id');
    $redirectUri = urlencode(config('services.instagram.redirect'));
    return redirect()->to("https://api.instagram.com/oauth/authorize?app_id=230589115714459&redirect_uri=".urlencode("https://localhost/Inflow/public/callback")."&scope=user_profile,user_media&response_type=code");
}

public function instagramProviderCallback(Request $request)
{
    $code = $request->code;
    if (empty($code)) return redirect()->route('home')->with('error', 'Failed to login with Instagram.');

    $appId ='230589115714459';     //config('services.instagram.client_id');
    $secret = '95b786109e132a7c01883593b07a69b7' ;//config('services.instagram.client_secret');
    $redirectUri = 'https://localhost/Inflow/public/callback' ;//config('services.instagram.redirect');

    $client = new Client();

    // Get access token
    $response = $client->request('POST', 'https://api.instagram.com/oauth/access_token', [
        'form_params' => [
            'app_id' => $appId,
            'app_secret' => $secret,
            'grant_type' => 'authorization_code',
            'redirect_uri' => $redirectUri,
            'code' => $code,
        ]
    ]);
// dd($response);


    if ($response->getStatusCode() != 200) {
        return redirect()->route('home')->with('error', 'Unauthorized login to Instagram.');
    }

    $content = $response->getBody()->getContents();
    $content = json_decode($content);
// dd($content);
    $accessToken = $content->access_token;
    $userId = $content->user_id;

    // Get user info
    $response = $client->request('GET', "https://graph.instagram.com/me?fields=id,username,account_type&access_token={$accessToken}");

    
    $content = $response->getBody()->getContents();
    $oAuth = json_decode($content);
dd($oAuth);
    // Get instagram user name 
    $username = $oAuth->username;

    // do your code here
}
}
