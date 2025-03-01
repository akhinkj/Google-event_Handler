<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once FCPATH . 'vendor/autoload.php'; 
use Twilio\Rest\Client;

class Cron extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Cron_model');
        $this->load->model('User_model');
        include_once APPPATH . "libraries/vendor/autoload.php";
    }

    // Example function for cron job
    public function runTask() {
        if (!$this->input->is_cli_request()) {
            echo "Access Denied! This script can only be run from the command line.";
            return;
        }

    $client = new Google_Client();
    $client->setClientId(getenv('GOOGLE_CLIENT_ID'));
    $client->setClientSecret(getenv('GOOGLE_CLIENT_SECRET'));
    $client->setRedirectUri(getenv('BASE_URL').'login');
    $client->setAccessType('offline');

    $accessToken="";
    $refreshToken="";
    $phone="";
    $details['det'] = $this->Cron_model->users();
				foreach ($details['det'] as $dets) {
					$accessToken = $dets['google_calendar_token'];
                    $refreshToken = $dets['google_refresh_token'];
                    $phone = $dets['phone_number'];
				

    if (!$accessToken) {
        echo "User is not authenticated!";
        return;
    }

    // Set Access Token
    $client->setAccessToken($accessToken);

    // Check if Access Token has expired
    if ($client->isAccessTokenExpired()) {
        if ($refreshToken) {
            // Refresh the token using refresh token
            $client->fetchAccessTokenWithRefreshToken($refreshToken);
            $newToken = $client->getAccessToken();

            // Update session with the new access token
            $this->session->set_userdata('google_calendar_token', $newToken['access_token']);
        } else {
            echo "Access Token Expired. Please re-authenticate.";
            return;
        }
    }

    // Initialize Google Calendar Service
    $service = new Google_Service_Calendar($client);
    $calendarId = 'primary';

    // Define time range (Next 5 minutes)
    $timeMin = date('c'); // Current time
    $timeMax = date('c', strtotime('+5 minutes')); // 5 minutes from now

    $optParams = [
        'orderBy' => 'startTime',
        'singleEvents' => true,
        'timeMin' => $timeMin,
        'timeMax' => $timeMax, // Fetch only events in the next 5 minutes
        // 'timeMin' => date('c'), // Fetch only the future events
    ];

    $events = $service->events->listEvents($calendarId, $optParams);

    // Display Events
    if (count($events->getItems()) == 0) {
        echo "No upcoming events found.";
    } else {
         //Trigger the Twilio function
        $this->make_call($phone); 
        foreach ($events->getItems() as $event) {
            $start = $event->start->dateTime ?: $event->start->date;
            echo "<li>" . $event->getSummary() . " (Start: " . $start . ")</li>";
        }
        echo "</ul>";
    }
}

        echo "Cron Job Executed Successfully!";
    }



    // twilio make a call function
    public function make_call($phone) {
        // Twilio credentials 
        $account_sid = getenv('TWILIO_SID');
        $auth_token = getenv('TWILIO_TOKEN');
        $twilio_number = getenv('TWILIO_PHONE_NUMBER');
        $to_number = '+91'.$phone; // recipient's phone number
    
        $client = new Client($account_sid, $auth_token);
    
        try {
            $call = $client->calls->create(
                $to_number, // To
                $twilio_number, // From
                [
                    'twiml' => '<Response><Say>Hello, this is a call to remind you the Google calander event!</Say></Response>'
                ]
            );
    
            echo "Call initiated successfully! Call SID: " . $call->sid;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>
