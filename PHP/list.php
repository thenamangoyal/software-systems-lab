<?php 
		
	$connection = mysqli_connect("localhost","root","abcd1234","project7");
	$limit = 0;
	if (isset($_POST["limit"])){
		$limit = $_POST["limit"];
	}
	$query = "Select * from events LIMIT 5 OFFSET " . 5*$limit;
	$result = mysqli_query($connection,$query);
	if ($result){
		while ($row = mysqli_fetch_assoc($result)) {
			
		$array[] = $row;	
	}
	header('Content-Type:Application/json');
	echo json_encode(array("events"=>$array,"success"=>true));
	}
	header('Content-Type:Application/json');
	echo json_encode(array("success"=>false));
  
 ?>