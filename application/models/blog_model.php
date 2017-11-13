<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class blog_model extends CI_Model {

	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		
	}
	
        // insert user info in database
	public function create_comment($comment, $user_id, $post_id) {
		
		$data = array(
                    
                        'comment'    => $comment,
			'user_id'   => $user_id,
			'post_id'   => $post_id,
			'date'      => date('Y-m-j H:i:s'),
			
		);
		
		return $this->db->insert('comments', $data);
		
                
       }
       
       
       public function getcomments($post_id){
           
           
           	$this->db->select("*");
		$this->db->from('comments');
		$this->db->where('post_id',$post_id);
		$query = $this->db->get();
		return $query->result();
           
       }

	// function to insert like into databasae
       
       function postlike($post_id,$user_id){
           
                
               $data = array(
                        'user_id'    => $user_id,
			'post_id'    => $post_id	
		        );
		
		return $this->db->insert('likes', $data);
       }
       
       // function get number of likes 
       
       function numberoflikes($post_id){
           
            $this->db->select('*')->from('likes')->where("post_id",$post_id); 
            $q = $this->db->get(); 
            return $q->num_rows();
       }
       
       // function check if auth user like  
       
       function authuserlike($post_id){
           
            $this->db->select('*')->from('likes')->where("post_id",$post_id)->where("user_id",$_SESSION['user_id']); 
            $q = $this->db->get(); 
            return $q->num_rows();
       }
       
       function removelike($post_id){
           
                $this->db->where('post_id', $post_id);
                $this->db->delete('likes');
           
       }
       

}
