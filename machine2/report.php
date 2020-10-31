
<!DOCTYPE html>
<html lang="en">
<head>

	<title>Complain Reports</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="text/css" href="images/rgv.jpg"/>
<!--===============================================================================================-->	
	 <link rel="icon" type="text/css" href="images/rgv.jpg"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="report/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="report/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="report/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="report/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="report/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="report/css/util.css">
	<link rel="stylesheet" type="text/css" href="report/css/main.css">
	
	<style>
.button {
  display: inline-block;
  border-radius: 10px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 20px;
  padding: 5px;
  width: 100px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
.select-css {
    display: block;
    font-size: 16px;
    font-family: sans-serif;
    font-weight: 700;
    color: #444;
    line-height: 1.3;
    padding: .6em 1.4em .5em .8em;
    
    max-width: 200px; 
  
    margin: 0;
    border: 1px solid #aaa;
    box-shadow: 0 1px 0 1px rgba(0,0,0,.04);
    border-radius: .5em;
    -moz-appearance: none;
    -webkit-appearance: none;
    appearance: none;
    background-color: #fff;
    background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23007CB2%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'),
      linear-gradient(to bottom, #ffffff 0%,#e5e5e5 100%);
    background-repeat: no-repeat, repeat;
    background-position: right .7em top 50%, 0 0;
    background-size: .65em auto, 100%;
}
.select-css::-ms-expand {
    display: none;
}
.select-css:hover {
    border-color: #888;
}
.select-css:focus {
    border-color: #aaa;
    box-shadow: 0 0 1px 3px rgba(59, 153, 252, .7);
    box-shadow: 0 0 0 3px -moz-mac-focusring;
    color: #222; 
    outline: none;
}
.select-css option {
    font-weight:normal;
}




		
</style>
<!--===============================================================================================-->
	
			
<!--===============================================================================================-->

</head>
<body >
	<form action="report.php" method="post">
	<div class="limiter">
	
		<div class="container-table100">
		
			
		<select name="id" class="select-css">
 			<option value="select">Select Sales Rep</option>
  
    <?php
				
			$con=mysqli_connect("localhost", "root", "");
		mysqli_select_db($con,"capitalholdings");

		$sql="select * from complain group by repfirst";
			$result=mysqli_query($con,$sql);
			
			while($rows=mysqli_fetch_array($result))
			 {
			$rid=$rows['repfirst'];
				
				 
			 echo "<option value='$rid'>$rid</option>";
				 
		
		
			
				}
	echo " </select>";
			
	?>
			

&nbsp;&nbsp;&nbsp;
	
		<button type="submit" class="button" name="sub" style="vertical-align:middle" onClick="show()" value="submit"><span>Search </span></button>
		
					<div class="wrap-table100">	
					<div id="tab1" class="table100 ver1">
					<div class="table100-firstcol">
						<table  border: 1px solid black>
							<thead style="float:center">
								<tr class="row100 head">	
									<th class="cell100 column1">Complain ID</th>
									</tr>									
							</thead>
							<tbody>
								
									<?php
										
										if(isset($_POST['sub']))
										{ 
										
											//echo"<script type='text/javascript'>document.getElementById('tab1').style.visibility = 'visible';document.getElementById('tab2').style.visibility = 'visible';</script>";
											$selid=$_POST['id'];
											if($selid!=='select')
											{	
											$sql="select c.id,c.complain,c.nomachine,cu.firstname,cu.tel,c.dop from complain c inner join customer cu on c.cus_id=cu.cus_id where c.repfirst='$selid'";
											$result=mysqli_query($con,$sql);
			
											while($rows=mysqli_fetch_array($result))
											{
													$reid=$rows['id'];
													$cin=$rows['firstname'];
													$cout=$rows['tel'];
													$guest=$rows['dop'];
													$mail=$rows['complain'];
													$dis=$rows['nomachine'];
													echo "<tr class='row100 body'>";
													echo "<td class='cell100 column1'><center>$reid</center></td>";
															
												
											
												 
										
										
											
											}
													echo " </tr>";
																	
											}
											else
											{
												echo"<script type='text/javascript'>alert('Please select a sales Rep')</script>";
											}
										}
																	
											
									?>
			
								</tr>

								
							</tbody>
						</table>
					</div>
					
					<div class="wrap-table100-nextcols js-pscroll">
						<div class="table100-nextcols">
							<table id="tab2">
								<thead>
									<tr class="row100 head">
										<th class="cell100 column2">Customer Name</th>
										<th class="cell100 column3">Telephone</th>
										<th class="cell100 column4">Purchase Date</th>
										<th class="cell100 column5">Complain</th>
										<th class="cell100 column6">No of Machines</th>
										
									</tr>
								</thead>
								<tbody>
									<?php
										
										if(isset($_POST['sub']))
										{ 
										
											//echo"<script type='text/javascript'>document.getElementById('tab1').style.display = 'block';document.getElementById('tab2').style.display = 'block';</script>";
											$selid=$_POST['id'];
											if($selid!=='select')
											{	
											$sql="select c.id,c.complain,c.nomachine,cu.firstname,cu.tel,c.dop from complain c inner join customer cu on c.cus_id=cu.cus_id where c.repfirst='$selid'";
											$result=mysqli_query($con,$sql);
			
											while($rows=mysqli_fetch_array($result))
											{
													$reid=$rows['id'];
													$cin=$rows['firstname'];
													$cout=$rows['tel'];
													$guest=$rows['dop'];
													$mail=$rows['complain'];
													$dis=$rows['nomachine'];
													echo "<tr class='row100 body'>";
													echo "<td class='cell100 column1'><center>$cin</center></td>";
													echo "<td class='cell100 column1'><center>$cout</center></td>";
													echo "<td class='cell100 column1'><center>$guest</center></td>";
													echo "<td class='cell100 column1'><center>$mail</center></td>";
													echo "<td class='cell100 column1'><center>$dis</center></td>";
															
												
											
												 
										
										
											
											}
													echo " </tr>";
																	
										}
								
										}						
											
									?>

									
								</tbody>
							</table>
							
						</div>
					</div>
				</div>
			</div>
			<a href="index.php" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
							 Home Page
							
							<i class="fa fa-long-arrow-right m-l-5"></i></a>
		</div>
	</div>
</form>

		

<!--===============================================================================================-->	
	<script src="report/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="report/vendor/bootstrap/js/popper.js"></script>
	<script src="report/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="report/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="report/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script src="js/drop.js"></script>
	

	<script>
		$('.js-pscroll').each(function(){
			var ps = new PerfectScrollbar(this);

			$(window).on('resize', function(){
				ps.update();
			})

			$(this).on('ps-x-reach-start', function(){
				$(this).parent().find('.table100-firstcol').removeClass('shadow-table100-firstcol');
			});

			$(this).on('ps-scroll-x', function(){
				$(this).parent().find('.table100-firstcol').addClass('shadow-table100-firstcol');
			});

		});	</script>


	
		
		

<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>