<?php


require "connect.php";

if ($_POST['functionname'] != '') {

	switch ($_POST['functionname']) {
		case 'insertdata':
			if($conn == true)
				echo json_encode("Database Connected");
			else
				echo json_encode("Connection failed..!!");
			$name = $_POST['name'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];

			if ($name!="" && $email!="" && $phone!="") {
				$sql = "INSERT INTO `testdb`.`trip`( `name`, `email`, `phone`,`dt`) VALUES ('$name','$email','$phone', current_timestamp());";
			if ($conn->query($sql))
				echo json_encode("Data inserted..!!");
			else
				echo json_encode("Error occured..!!");
			}
		break;

		case 'getData':
			
			$sql = "SELECT * FROM trip ORDER BY dt;";
			$stmt = $conn->prepare($sql);
			$stmt->execute();

			$data_arr = array();	
			$data_arr['records'] = array();

			if ($stmt->rowCount() > 0) {
    			while($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
        			array_push($data_arr['records'],$row);
    			}
			}
			echo json_encode($data_arr);

		break;
		
		default:
			echo "Invalid Input";
			break;
	}


function getData(){

}

}	
?>
