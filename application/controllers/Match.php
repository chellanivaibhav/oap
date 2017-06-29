<?php

class Match extends CI_Controller
{
		//takes sport_type and timestamp and returns rows with timestamp later than than timestamp passed
		/*function __construct(argument)
			{
				# code...
				include https://api.crowdscores.com/v1;
			}*/
			public function getupcoming()
			{	
				$type=$_REQUEST['sport_type'];



				$this->db->select('*');
				$this->db->from('sports');
				$this->db->where('sport_type',$type);
				$this->db->where('sport_time >',time());
		//todo after api work
				$sql=$this->db->get();

				if ($sql->num_rows())
				{	
					foreach ($sql->result() as $row)
					{
						echo $row->sport_location;
						echo $row->sport_time;

					}
				}
				else
				{
					echo "No Result";
				}
			}
			public function setupcoming()
			{		

			$url = 'https://soccer.sportmonks.com/api/v2.0/teams/14?'.http_build_query(array(
				api_token =>'xl8zKNXU1OcDuGdmzKscvIQ3PQptau4ujTJ083IqmPM1s9EN64K2igCMCmhf' 
				));

			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			$data = curl_exec($ch);
			curl_close($ch);
			
			//$aray = json_decode(json_encode($data),true);
			$a= json_decode($data);
			foreach ($a as  $value) {
				# code...
				//print_r($value);
				foreach ($value as $value2) {
					//print_r($value2);
					foreach ($value2 as $value3){
						print_r($value3);
					//echo $value3->ends_at;
					}
					//echo $value2->subscription;
					# code...
				}
				//echo "hi".$value->data->id;
			}
		}

		public function getlivescores


	}


	?>