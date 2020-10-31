<?php
session_start();
$usr=$_SESSION["uname"];
$repFirst=$_POST["contactInfo_firstName"];
$repLast=$_POST["contactInfo_lastName"];
$warnty=$_POST["compalintLetter_writeComplaintLetter"];
$purDate=$_POST["agreementDate"];
$qty=$_POST["totalGoodsServices"];
$cmplain=$_POST["complaintAbout"];
$cusid=0;


	function getCusId($userna)
	{
		
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://localhost:8080/customer/cusId?usrname=".$userna."",
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
	
$curl = curl_init();


curl_setopt_array($curl, array(
  CURLOPT_URL => "http://localhost:8080/complains/save?cusid=$cusid",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"{\"complain\":\"$cmplain\",\r\n \"repfirst\":\"$repFirst\",\r\n \"replast\":\"$repLast\",\r\n \"warranty\":\"$warnty\",\r\n \"purDate\":\"$purDate\",\r\n \"nomachine\":\"$qty\"\r\n \r\n}",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json"
  ),
));

$response = curl_exec($curl);

curl_close($curl);


echo"
		<script type='text/javascript'>
		alert('Complain added. Our Service team will contact you');
		window.location.replace('complaint.html');
		</script>";
	




?>