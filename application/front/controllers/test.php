<?php

/**
 * Created by PhpStorm.
 * User: abdel-latifmabrouck
 * Date: 11/02/2017
 * Time: 01:39
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// Autoload the required files
require_once( APPPATH . 'Facebook/autoload.php' );
class CI_Facebook {
    var $ci;
    var $session = false;
    public function __construct() {
        // Get CI object.
        $this->ci =& get_instance();
    }
    private function fbConnect() {
        $fb = new Facebook\Facebook([
            'app_id' => '{your_app_id}',
            'app_secret' => '{your_app_secret}',
            'default_graph_version' => 'v2.4',
        ]);
        return $fb;
    }
    public function login() {
        $fb = $this->fbConnect();
        $helper = $fb->getRedirectLoginHelper();
        try {
            $accessToken = $helper->getAccessToken();
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
        if (! isset($accessToken)) {
            if ($helper->getError()) {
                header('HTTP/1.0 401 Unauthorized');
                echo "Error: " . $helper->getError() . "\n";
                echo "Error Code: " . $helper->getErrorCode() . "\n";
                echo "Error Reason: " . $helper->getErrorReason() . "\n";
                echo "Error Description: " . $helper->getErrorDescription() . "\n";
            } else {
                header('HTTP/1.0 400 Bad Request');
                echo 'Bad request';
            }
            exit;
        }
        // The OAuth 2.0 client handler helps us manage access tokens
        $oAuth2Client = $fb->getOAuth2Client();
        // Get the access token metadata from /debug_token
        $tokenMetadata = $oAuth2Client->debugToken($accessToken);
        // Validation (these will throw FacebookSDKException's when they fail)
        $tokenMetadata->validateAppId('{your_app_id}');
        // If you know the user ID this access token belongs to, you can validate it here
        $tokenMetadata->validateExpiration();
        if (! $accessToken->isLongLived()) {
            // Exchanges a short-lived access token for a long-lived one
            try {
                $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                echo "Error getting long-lived access token: " . $helper->getMessage() . " ";
                exit;
            }
        }
        $_SESSION['fb_access_token'] = (string) $accessToken;
        $session_data = $_SESSION['fb_access_token'];
        // User is logged in with a long-lived access token.
        // You can redirect them to a members-only page.
        header('Location: http://example.com/member');
    }
    public function login_url() {
        $fb = $this->fbConnect();
        $permissions = ['email','user_photos','user_posts']; // Optional permissions
        $helper = $fb->getRedirectLoginHelper();
        return $helper->getLoginUrl('http://example.com/callback', $permissions);
    }
    public function getUser($token) {
        $fb = $this->fbConnect();
        //First we need to get the logged users facebook id
        $requestUserId = $fb->get('/me?fields=id', $token);
        $userId = $requestUserId->getGraphUser();
        return $userId['id'];
    }
}