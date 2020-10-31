<?php
$curl=curl_init();
session_start();//change
$cusid=0;//change
//Variables that are received from the html file
	$usr=$_SESSION["uname"];//change
	$prodid=$_REQUEST['productID'];
	$purchID=$_REQUEST['purchasID'];
	$day=$_REQUEST['day'];
	$month=$_REQUEST['month'];
	$year=$_REQUEST['year'];
	$problemDesc=$_REQUEST['problemDescription'];
//change
function getCusId($userna)
	{
		
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://localhost:8015/customer/cusId?usrname=".$userna."",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		));

		$response = curl_exec($curl);

		curl_close($curl);
		return $response;

		
	}
	settype($cusid, "integer");
	$cusid=getCusId($usr);
//Stores in array to convert to json format
	$array = [
		'ServiceID' => 1,
		'DOService' => "$year-$month-$day",
		'probDesc' => "$problemDesc",
		'product_id' => "$prodid",
		'purchase_id' => "$purchID"
	];

//Encode to JSON format
	$request=json_encode($array);

/*$request='{
			"ServiceID":1,
			"DOService":"2020-01-02",
			"probDesc":"This is working properly"
		}';*/
curl_setopt($curl, CURLOPT_URL,"http://localhost:8015/serviceapi/proserv?cusid=$cusid");
curl_setopt($curl, CURLOPT_POST,true);
curl_setopt($curl, CURLOPT_HTTPHEADER,['content-type:application/json']);
curl_setopt($curl, CURLOPT_POSTFIELDS,$request);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
$result=curl_exec($curl);
$err=curl_error($curl);
if($err) {
	echo 'Curl Error: '.$err;
} else {
	


	$response = json_decode($result,true);
//	print_r($response['response']['result']);
	//code starts here
$curl = curl_init();
curl_setopt_array($curl, array(
CURLOPT_URL => "http://localhost:8015/serviceapi/proserv?cusid=$cusid",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "GET",
//CURLOPT_POSTFIELDS =>"{\n\t\"ServiceID\":1,\n\t\"DOService\":\"$year/$month/$day\",\n\t\"probDesc\":\"$problemDesc\"\n}",
CURLOPT_HTTPHEADER => array(
"Content-Type: application/json"
),
));
$response = curl_exec($curl);
echo $response;
}
curl_close($curl);
if (!empty($curl)) { 
    //header("Location: Succesful.php");
	//exit();
} 

?>