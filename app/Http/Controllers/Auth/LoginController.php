<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use GuzzleHttp\Client;
use App\User;
use Illuminate\Support\Facades\Auth;


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
        $this->middleware('guest' )->except( 'logout' );
    }

    public function redirectToInstagramProvider(){
        $appId = config( 'services.instagram.client_id' );
        $redirectUri = urlencode( config( 'services.instagram.redirect' ) );
        return redirect()->to( 'https://api.instagram.com/oauth/authorize?app_id=452004699411788&redirect_uri='.urlencode( 'https://localhost/Inflow/public/callback' ).'&scope=user_profile,user_media&response_type=code' );
    }

    public function instagramProviderCallback( Request $request ){
        $code = $request->code;
        if ( empty( $code ) ) return redirect()->route( 'home' )->with( 'error', 'Failed to login with Instagram.' );

        $appId = '452004699411788';
        //'230589115714459';
        //config( 'services.instagram.client_id' );
        $secret = '1b8fa01b14d07bb19828cf6ca9835180';
        //'95b786109e132a7c01883593b07a69b7' ;
        //config( 'services.instagram.client_secret' );
        $redirectUri = 'https://localhost/Inflow/public/callback' ;
        //config( 'services.instagram.redirect' );

        $client = new Client();

        // Get access token
        $response = $client->request( 'POST', 'https://api.instagram.com/oauth/access_token', [
            'form_params' => [
                'app_id' => $appId,
                'app_secret' => $secret,
                'grant_type' => 'authorization_code',
                'redirect_uri' => $redirectUri,
                'code' => $code,
            ]
        ] );
        // dd( $response );

        if ( $response->getStatusCode() != 200 ) {
            return redirect()->route( 'home' )->with( 'error', 'Unauthorized login to Instagram.' );
        }

        $content = $response->getBody()->getContents();
        $content = json_decode( $content );
        //  dd( $content );
        $accessToken = $content->access_token;
        $userId = $content->user_id;

        // Get user info
        $response = $client->request( 'GET', "https://graph.instagram.com/me?fields=id,username,account_type&access_token={$accessToken}" );

        $content = $response->getBody()->getContents();
        $oAuth = json_decode( $content );
        // dd( $oAuth );
        // Get instagram user name
        $username = $oAuth->username;
        $user_influencer = new User();
        $user_influencer->name = $username;
        $user_influencer->email = $username;

        $user_influencer->role_id = 1;
        // role_id = 1 => influencer account
        $user_influencer->save();

    ;
        // $user=User::find($user_influencer->id);
        Auth::login($user_influencer);

        $follwers = $this->getDetails( 'https://instagram.com/'.$username );

        return redirect(route('dash'));
     
        // $data = $res->getBody()->getContents();
        // $oAuthd = json_decode( $data );
        // dd( $res );

        // do your code here
    }

    function getDetails( $pageUrl ) {
        $url = $pageUrl;
        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, FALSE );
        curl_setopt( $ch, CURLOPT_HEADER, false );
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
        curl_setopt( $ch, CURLOPT_URL, $url );
        curl_setopt( $ch, CURLOPT_REFERER, $url );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, TRUE );
        $result = curl_exec( $ch );
        curl_close( $ch );
        // dd( $result );
        $output;
        $metaPos = strpos( $result, '<meta content=' );
        if ( $metaPos != false )
 {
            $meta = substr( $result, $metaPos, 70 );

            //meghdare followers
            $followerPos = strpos( $meta, 'Followers' );
            $followers = substr( $meta, 15, $followerPos-15 );
            $output[0] = $followers;

            //meghdare followings
            // $commaPos = strpos( $meta, ',' );
            $followingPos = strpos( $meta, 'Following' );
            $followings = substr( $meta, $followerPos+10, $followingPos - ( $followerPos+10 ) );
            $output[1] = $followings;

            //meghdare posts
            $seccondCommaPos = $followingPos + 10;
            $postsPos = strpos( $meta, 'Post' );
            $posts = substr( $meta, $seccondCommaPos, $postsPos - $seccondCommaPos );
            $output[2] = $posts;

            //   //image finder
            //     $imgPos = strpos( $result, 'og:image' );
            //     $image = substr( $result, $imgPos+19, 200 );
            //     $endimgPos = strpos( $image, '/>' );
            //     $finalImagePos = substr( $result, $imgPos+19, $endimgPos-2 );
            //     $output[3] = $finalImagePos;

            return $output;
        } else {
            return null;
        }
    }

}