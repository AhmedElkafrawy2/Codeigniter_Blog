<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class post_model extends CI_Model {

	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		
	}
	
        // insert user info in database
	public function create_post($posttitle, $postbody, $postimage,$postuserid) {
		
		$data = array(
			'post_title'   => $posttitle,
			'post_body'    => $postbody,
			'post_image'   => $postimage,
			'post_date'      => date('Y-m-j H:i:s'),
			'user_id'      => $postuserid
		);
		
		return $this->db->insert('posts', $data);
		
	}
        
        
        public function getallposts(){
            
            	$this->db->select("*");
		$this->db->from('posts');
		$query = $this->db->get();
		return $query->result();
                
        }
        
        public function getpostnamefromid($id){
            
                $this->db->select('username');
		$this->db->from('users');
		$this->db->where('id', $id);
		return $this->db->get()->row('username');
            
        }

}
