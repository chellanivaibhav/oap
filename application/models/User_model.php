<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	* 
	*/
	class User_model extends CI_Model
	{
		
		public function validateuser($email)
		{
			echo "hey";
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

	}

?>