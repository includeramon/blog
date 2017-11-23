<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url_helper');
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function gin()
    	{
            // Fill CLIENT ID, CLIENT SECRET ID, REDIRECT URI from Google Developer Console
        	$client_id = '514898542858-mrvlgmj98evrplfj7gp4smj4jotidvnm.apps.googleusercontent.com';
        	$client_secret = 'fDrFzd9AxOuLRwrxmS7PJH4x';
        	$redirect_uri = 'http://ramon1.nip.io/login/gcallback';

        	//Create Client Request to access Google API
        	$client = new Google_Client();
        	$client->setApplicationName("Ramon Web client 1");
	        $client->setClientId($client_id);
        	$client->setClientSecret($client_secret);
	        $client->setRedirectUri($redirect_uri);
        	$client->addScope("email");
	        $client->addScope("profile");

        	//Send Client Request
	        $objOAuthService = new Google_Service_Oauth2($client);
        
        	$authUrl = $client->createAuthUrl();
        
	        header('Location: '.$authUrl);
	}	
	
	public function gcallback()
    	{
        	    // Fill CLIENT ID, CLIENT SECRET ID, REDIRECT URI from Google Developer Console
	     $client_id = '514898542858-mrvlgmj98evrplfj7gp4smj4jotidvnm.apps.googleusercontent.com';
	     $client_secret = 'fDrFzd9AxOuLRwrxmS7PJH4x';
	     $redirect_uri = 'http://ramon1.nip.io/login/gcallback';

	    //Create Client Request to access Google API
	    $client = new Google_Client();
	    $client->setApplicationName("Ramon Web client 1");
	    $client->setClientId($client_id);
	    $client->setClientSecret($client_secret);
	    $client->setRedirectUri($redirect_uri);
	    $client->addScope("email");
	    $client->addScope("profile");

	    //Send Client Request
	    $service = new Google_Service_Oauth2($client);

	    $client->authenticate($_GET['code']);
	    $_SESSION['access_token'] = $client->getAccessToken();
    
	    // User information retrieval starts..............................

	    $user = $service->userinfo->get(); //get user info 

	    echo "</br> User ID :".$user->id; 
	    echo "</br> User Name :".$user->name;
	    echo "</br> Gender :".$user->gender;
	    echo "</br> User Email :".$user->email;
	    echo "</br> User Link :".$user->link;    
	    echo "</br><img src='$user->picture' height='200' width='200' > ";
       }
}
