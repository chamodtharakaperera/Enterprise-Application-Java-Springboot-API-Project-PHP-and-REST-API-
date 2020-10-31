<?php
function insert()
			{
				

				$curl = curl_init();

				curl_setopt_array($curl, array(
				  CURLOPT_URL => "http://localhost:8080/customer/",
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 0,
				  CURLOPT_FOLLOWLOCATION => true,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "POST",
				  CURLOPT_POSTFIELDS =>"{\"firstName\": \"$fname\",\"lastName\": \"$lname\",\"email\": \"$emal\",\"add\":\"$add\",\"tel\":\"$tel\",\"username\":\"$uname\",\"password\":\"$pass\"}",
				  CURLOPT_HTTPHEADER => array(
					"Content-Type: application/json"
				  ),
				));

				$response = curl_exec($curl);

				curl_close($curl);
			
?>