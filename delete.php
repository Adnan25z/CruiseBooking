<?php
	require_once "settings.php";	// Load MySQL log in credentials
	$conn = mysqli_connect ($host,$user,$pwd,$sql_db);
	$id = $_GET['id'];
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "DELETE FROM orders WHERE order_id = $id AND order_status = 'PENDING' "; 

	if (mysqli_query($conn, $sql)) {
		mysqli_close($conn);
		header('Location:manager.php'); 
		exit;
	} else {
		echo "Error deleting record";
	}
?>