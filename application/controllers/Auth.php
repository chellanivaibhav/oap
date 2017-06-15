<?php
	/**
	* 
	*/
	class Auth extends CI_Controller
	{
		public function index()
		{
			echo "it run";
		}		
		public function login()
		{
			$method=$_SERVER["REQUEST_METHOD"];
			if($method!='POST')
			{
				$response['status']='false';
				$response['message']='Bad Request';
			}
			else
			{
				$email=$_REQUEST['email'];
				$password=$_REQUEST['password'];
				$result=$this->User_model->validateuser($email);
				if($result == false)
		{
			//echo "Please provide correct email";
			$response['success'] = false;
			$response['message'] = "Incorrect Password";
		}
		else
		{
			//foreach ($response as $value) {//get password equivalent to email
					# code...
					if($result->password == $password)
					{
						// echo "Successfully logged in";
						$data = array('name' =>$result->username  );
						// $this->session->set_userdata($data);
						// //redirect code goes here
						$response['success'] = true;
						$response['message'] = 'Successfully Logged In';
						//$response['message'] = "Please provide correct email";
						$response['data'] = $data;
						
					}
					else
					{
						$response['success'] = false;
						$response['message'] = "Please provide correct passowrd";
					}
				//}	
		}
		echo json_encode($response);
			}

		}

	}

?>