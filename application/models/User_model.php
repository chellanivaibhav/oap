<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	* 
	*/
	class User_model extends CI_Model
	{
		
		public function validateuser($email)
		{
    		$this->db->select('*');
			$this->db->from('users');
			$this->db->where('email',$email);
			$query=$this->db->get();

			if($query->num_rows())
			{	echo "inside if";
				return $query->row();
			}
			else
			{			 

				return false;

			}
		}
		public function checkusername($username)
		{
			echo "inside checkusername";
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('username',$username);
			$q=$this->db->get();
			
			if($q->num_rows())
			{	
				return false;
			}
			else
			{	
				return true;
			}
		}

	}

?>