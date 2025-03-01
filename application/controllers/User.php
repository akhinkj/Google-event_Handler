<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
    {
      parent::__construct();
      $this->load->helper('url');
      $this->load->model('User_model');
      if (!$this->session->userdata('uid')) {
        $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
        redirect(base_url() . 'login');
      }
    }

    public function index(){
    $data['user'] = $this->User_model->index();
    $this->load->view('user/layout/header');
		$this->load->view('user/details', $data);
    }

    public function update(){
      $id=$this->session->userdata('uid');
      $phone=$this->input->post('phone');
      
      // Validate phone number (Only digits, length between 10-15)
    if (!preg_match('/^\d{10,15}$/', $phone)) {
      $this->session->set_flashdata('error', "Invalid phone number. Please enter a valid number (10-15 digits).");
      redirect($_SERVER['HTTP_REFERER']);
      return;
  }

      $data=$this->User_model->update_user(array('phone_number'=>$phone),$id);
      if($this->db->affected_rows() > 0)
      {
          $this->session->set_flashdata('success', "Phone number updated succesfully"); 
      }else{
          $this->session->set_flashdata('error', "Sorry, Phone number updation failed.");
      }
      redirect($_SERVER['HTTP_REFERER']);

    }

    // User logout function
function logout() {
  // Unset all Google authentication-related session data
  $this->session->unset_userdata('access_token');
  $this->session->unset_userdata('google_calendar_token'); // Remove calendar access token
  $this->session->unset_userdata('google_refresh_token');  // Remove refresh token
  $this->session->unset_userdata('user_data');
  $this->session->unset_userdata('uid');

  // Redirect to login page
  redirect(base_url() . 'login');
}

}