<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class loginController extends CI_Controller {


	// this function is to return login form
	public function index()
	{
                 //echo base_url();
		$this->load->view('App/header');
		$this->load->view('loginform');
		$this->load->view('App/footer');
	}
        
        // this function to post the login form
        
        public function postlogin(){
            
            
        }
}

