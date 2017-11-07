<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class blogController extends CI_Controller {


	// this function return the register form 
	public function index()
	{
                 
                // check if the user is logged in
                if($this->session->userdata('logged_in')){
               
		$this->load->view('App/header');
		$this->load->view('blog');
		$this->load->view('App/footer');
	        }else{
                    
                    redirect("/register");
                }
       }
}

