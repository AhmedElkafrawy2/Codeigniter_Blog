<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class registerController extends CI_Controller {


        // set the controller constructor
        
        public function __construct(){
            
            // load user modal 
            parent::__construct();
            $this->load->model('user_model');
        }
        
        
	// this function return the register form 
	public function index()
	{
                 //echo base_url();
		$this->load->view('App/header');
		$this->load->view('registerform');
		$this->load->view('App/footer');
	}
        
        
        // this function to post the from register to the server    
        public function postregister(){
            
            // create the data object
            $data = new stdClass();

            // set validation rules
            $this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[4]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]'
                    , array('is_unique' => 'This email already exists. Please choose another one.'));
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
            $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
       
            
            if($this->form_validation->run() === false) {
			
                    // validation not ok, send validation errors to the view
                    $this->load->view('App/header');
                    $this->load->view('registerform', $data);
                    $this->load->view('App/footer');
			
		} else {
			
			// set variables from the form
			$username = $this->input->post('username');
			$email    = $this->input->post('email');
			$password = $this->input->post('password');
			
			if ($this->user_model->create_user($username, $email, $password)){
				
				// user creation ok
                                // this how to return the user back => redirect($this->agent->referrer());
                            
                            	$user_id = $this->user_model->get_user_id_from_username($username);
				$user    = $this->user_model->get_user($user_id);
                                // set session user datas
				$_SESSION['user_id']      = (int)$user->id;
				$_SESSION['username']     = (string)$user->username;
				$_SESSION['logged_in']    = (bool)true;
				$_SESSION['is_confirmed'] = (bool)$user->is_confirmed;
				$_SESSION['is_admin']     = (bool)$user->is_admin;
                                
                                redirect("/home");
				
				
			} else {
				
				// user creation failed, this should never happen
				$data->error = 'There was a problem creating your new account. Please try again.';
				
				// send error to the view
				$this->load->view('App/header');
				$this->load->view('registerform', $data);
				$this->load->view('App/footer');

			}
			
		}
       }
}

