<?php
	require_once "settings.php";	// Load MySQL log in credentials
	function sanitise_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
 	}
	$id = $_POST["order_id"];
	$id = sanitise_input($id);
	$os = $_POST["order_status"];
	//Connect DB
	$conn = mysqli_connect ($host,$user,$pwd,$sql_db);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "UPDATE orders SET order_status = '$os' WHERE order_id = '$id'";  //Create query based on the ID passed from table

	if (mysqli_query($conn, $sql)) {
		mysqli_close($conn);
		header('Location:manager.php'); 
		exit;
	} else {
		echo "Error updating record";
	}
?>