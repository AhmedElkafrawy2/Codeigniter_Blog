<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class blogController extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->model('post_model');
        if(!$this->session->userdata('logged_in')){
            
            redirect("/register");
        }
    }
	// this function return the register form 
	public function index()
	{
                 
                // get all user information
                $user_id   = $_SESSION['user_id'];
                $username  = $_SESSION['username'];
                $useremail = $_SESSION['email'];
                $isadmin   = $_SESSION['is_admin'];
                
                $data = array(
                    "user_id" => $user_id,
                    "username" => $username,
                    "useremail" => $useremail,
                    "isadmin" => $isadmin,
                );
                
                // check if the user is logged in
             
               
		$this->load->view('App/header');
		$this->load->view('blog',$data);
		$this->load->view('App/footer');
             
       }
       
       // this function is to load the form to create post
       public function createpostform(){
           
           
                $this->load->view('App/header');
		$this->load->view('createpostform');
		$this->load->view('App/footer');
             
           
       }
       
       // function to insert post data
       public function insertpost(){
           
            // create the data object
            $data = new stdClass();
            $postimage;
            
            // set validation rules
            $this->form_validation->set_rules('post-title', 'post title', 'trim|required');
            $this->form_validation->set_rules('post-body', 'post body', 'trim|required');
                
            if($this->form_validation->run() === false) {
			
                    // validation not ok, send validation errors to the view
      
                    $this->load->view('App/header');
                    $this->load->view('createpostform', $data);
                    $this->load->view('App/footer');
                    
			
	     } else {
			
			// set variables from the form
			$posttitle    = $this->input->post('post-title');
			$postbody     = $this->input->post('post-body');
                        $post_user_id = $_SESSION['user_id'];
                        
                        // upload the image 
                        $config['upload_path']          = './uploads/';
                        $config['allowed_types']        = 'gif|jpg|png';
                        $config['max_size']             = 1000;
                        $config['max_width']            = 2024;
                        $config['max_height']           = 1068;

                        $this->load->library('upload', $config);


                        if (isset($_POST['post-image']) && !$this->upload->do_upload('post-image'))
                        {
                                $error = array('error' => $this->upload->display_errors());
                                $this->load->view('App/header');
                                $this->load->view('createpostform', $error);
                                $this->load->view('App/footer');
                                return;
                        }
                        else
                        {
                                $data = array('upload_data' => $this->upload->data());
                                $postimage = base_url() ."uploads/" .$data['upload_data']['file_name'];
                                //$this->load->view('createpostform', $data);
                        }
                        
			
			
			if ($this->post_model->create_post($posttitle, $postbody, $postimage ,$post_user_id)){
				
				
                                // this how to return the user back => redirect($this->agent->referrer());
                            
                            	$postinserted = array('successs' => "Post Inserted");
				//$data->postinserted = 'Post Inserted';
				
				// send error to the view
				$this->load->view('App/header');
				$this->load->view('createpostform', $postinserted);
				$this->load->view('App/footer');
				
				
			} else {
				
				// user creation failed, this should never happen
				$data->error = 'There was a problem creating your new account. Please try again.';
				
				// send error to the view
				$this->load->view('App/header');
				$this->load->view('createpostform', $data);
				$this->load->view('App/footer');

			}
			
		}
           
       }
       
       // this function to recive image from ajax and upload it to server
       public function displayimage(){
           
            
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 1000;
            $config['max_width']            = 2024;
            $config['max_height']           = 1068;
            
            $this->load->library('upload', $config);
           
            
            if (!$this->upload->do_upload('image'))
            {
                    $error = array('error' => $this->upload->display_errors());
                    
                    //$this->load->view('createpostform', $error);
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());
                    echo base_url() ."uploads/" .$data['upload_data']['file_name'];
                    //$this->load->view('createpostform', $data);
            }
       }
       
       // log out function
       
      	public function logout() {
		
		// create the data object
		$data = new stdClass();
		
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			
			// remove session datas
			foreach ($_SESSION as $key => $value) {
				unset($_SESSION[$key]);
			}
			
                        redirect("/register");
			
		} else {
			
			// there user was not logged in, we cannot logged him out,
			// redirect him to site root
			redirect('/');
			
		}
		
	}
}

