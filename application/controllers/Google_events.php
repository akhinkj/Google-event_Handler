<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once FCPATH . 'vendor/autoload.php'; 
use Twilio\Rest\Client;


class Google_events extends CI_Controller {

 public function __construct()
 {
  parent::__construct();
  $this->load->helper('url');
  $this->load->model('google_event_model');
  $this->load->model('User_model');
  include_once APPPATH . "libraries/vendor/autoload.php";
 }

 function login() {
    include_once APPPATH . "libraries/vendor/autoload.php";

    $google_client = new Google_Client();
    $google_client->setClientId(getenv('GOOGLE_CLIENT_ID'));
    $google_client->setClientSecret(getenv('GOOGLE_CLIENT_SECRET'));
    $google_client->setRedirectUri(getenv('BASE_URL').'login');

    // Request email, profile, and Google Calendar access
    $google_client->addScope('email');
    $google_client->addScope('profile');
    $google_client->addScope(Google_Service_Calendar::CALENDAR); // Request Google Calendar access
    $google_client->setAccessType('offline'); // Ensures refresh token is received
    $google_client->setPrompt('consent'); // Forces user consent to get a refresh token

    if (isset($_GET["code"])) {
        $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

        if (!isset($token["error"])) {
            $google_client->setAccessToken($token['access_token']);

            // Store tokens in session
            $this->session->set_userdata('access_token', $token['access_token']);

            // Check and store refresh token
            if (isset($token['refresh_token'])) {
                $this->session->set_userdata('google_refresh_token', $token['refresh_token']);
            }

            $google_service = new Google_Service_Oauth2($google_client);
            $data = $google_service->userinfo->get();

            $current_datetime = date('Y-m-d H:i:s');

            if ($this->google_event_model->Is_already_register($data['id'])) {
                // Update existing user
                $user_data = array(
                    'first_name' => $data['given_name'],
                    'last_name' => $data['family_name'],
                    'email_address' => $data['email'],
                    'profile_picture' => $data['picture'],
                    'updated_at' => $current_datetime
                );

                $this->google_event_model->Update_user_data($user_data, $data['id']);
            } else {
                // Insert new user
                $user_data = array(
                    'login_oauth_uid' => $data['id'],
                    'first_name' => $data['given_name'],
                    'last_name' => $data['family_name'],
                    'email_address' => $data['email'],
                    'profile_picture' => $data['picture'],
                    'google_calendar_token' => $token['access_token'],
                    'google_refresh_token' => $token['refresh_token'],
                    'created_at' => $current_datetime
                );

                $this->google_event_model->Insert_user_data($user_data);
            }

            // Store user data and Google Calendar access token
            $this->session->set_userdata('user_data', $user_data);
            $this->session->set_userdata('uid', $data['id']);
            $this->session->set_userdata('google_calendar_token', $token['access_token']);
        }
    }

    $login_button = '';
    if (!$this->session->userdata('access_token')) {
        $login_button = '<a href="' . $google_client->createAuthUrl() . '"><img src="' . getenv('BASE_URL') . 'asset/google_login.png" /></a>';
        $data['login_button'] = $login_button;
        $this->load->view('google_login', $data);
    } else {
        redirect(getenv('BASE_URL') . 'user/home');
    }
}

}
?>

