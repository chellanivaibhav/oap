<?php
	/**
	* 
	*/
	class Auth extends CI_Controller
	{
		public function signup()
		{
			
			//check if username exists
			$username=$_REQUEST['username'];
			echo $username;
			$checkUsername=$this->User_model->checkusername($username);
			echo $checkUsername;
			if($checkUsername==false)
			{	
				echo "inside if";
				$response['status']=false;
				$response['message']='Username already exists';
			}
			else
			{	
				echo "inside else";
				$email=$_REQUEST['email'];
				$password=$_REQUEST['password'];
				$phoneno=$_REQUEST['phoneno'];
				$userimg='';
				$created_date = date("Y-m-d H:i:s");
				
				$sql="INSERT INTO users VALUES (?,?,?,?,?,?,?)";
				$flag=$this->db->query($sql,array('',$username,$phoneno,$email,$password,$created_date,$userimg));
				if($flag==true)
				{
					$response['status']=true;
					$response['message']='Successfully Signed Up';

				}
				else
				{
					$response['status']=false;
					$response['message']='Attempt Unsuccessful';
				}
			}
			echo json_encode($response);
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
					$response['success'] = false;
					$response['message'] = "Email Does Not Exist";
				}
				else
				{
					if($result->password == $password)
					{
						$data = array('name' =>$result->username  );
						$response['success'] = true;
						$response['message'] = 'Successfully Logged In';
						$response['data'] = $data;
						
					}
					else
					{
						$response['success'] = false;
						$response['message'] = "Please provide correct passowrd";
					}
				}
				echo json_encode($response);
			}

		}
		
	}

	?>