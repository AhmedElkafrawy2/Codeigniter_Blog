<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class loginController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        if($this->session->userdata('logged_in')){
            
         redirect("/home");
            
        }
    }
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
            
            	// create the data object
		$data = new stdClass();

		
		// set validation rules
		$this->form_validation->set_rules('loginemail', 'Username', 'trim|required|valid_email');
		$this->form_validation->set_rules('loginpassword', 'Password', 'required');
                
                if ($this->form_validation->run() == false) {
			
			// validation not ok, send validation errors to the view
			$this->load->view('header');
			$this->load->view('loginform');
			$this->load->view('footer');
			
		} else {
			
			// set variables from the form
			$username = $this->input->post('loginemail');
			$password = $this->input->post('loginpassword');
			
			if ($this->user_model->resolve_user_login($username, $password)) {
				
				$user_id = $this->user_model->get_user_id_from_username($username);
				$user    = $this->user_model->get_user($user_id);
				
				// set session user datas
				$_SESSION['user_id']      = (int)$user->id;
				$_SESSION['username']     = (string)$user->username;
				$_SESSION['email']        = (string)$user->email;
				$_SESSION['logged_in']    = (bool)true;
				$_SESSION['is_admin']     = (bool)$user->is_admin;
				
				// redirect user to home pgae
                                redirect("/home");
				
			} else {
				
				// login failed
				$data->error = 'Wrong username or password.';
				
				// send error to the view
				$this->load->view('App/header');
				$this->load->view('loginform', $data);
				$this->load->view('App/footer');
				
			}
			
		}
            
        }
}

