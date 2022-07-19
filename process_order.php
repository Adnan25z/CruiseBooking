<?php
/* process_order.php
   Processes form info from payment.php
   Author: Adnan Zafar
*/

	// Sanitise data
	function sanitise_input($data) {
   		$data = trim($data);
   		$data = stripslashes($data);
   		$data = htmlspecialchars($data);
   		return $data;
	}

	//  Check if it is submitted by payment form submission
	if (!isset($_POST["payButton"])) {//it is not triggered by payment form submission (eg. by direct URL access)
		header("location:enquire.php");
		exit();
	}

	/***** Form Validation *****/
	$err_msg="";	//error message variable

	//First Name
	if (!isset($_POST["first-name"])) {
		header("location:enquire.php");
		exit();
	}
	else{
		$firstName=$_POST["first-name"];  
		$firstName=sanitise_input($firstName);
		if ($firstName=="") {
			$err_msg .= "<p>Please enter your first name.</p>";
		}
		else if (!preg_match("/^[a-zA-Z]{2,20}$/",$firstName)) {
			$err_msg .= "<p>First name can only contain max 20 alpha characters.</p>";
		}
	}

	//Last Name
	if (!isset($_POST["last-name"])) {
		header("location:enquire.php");
		exit();
	}
	else{
		$lastName=$_POST["last-name"];
		$lastName=sanitise_input($lastName);
		if ($lastName=="") {
			$err_msg .= "<p>Please enter your last name.</p>";
		}
		else if (!preg_match("/^[a-zA-Z]{2,20}$/",$lastName)) {
			$err_msg .= "<p>Last name can only contain max 20 alpha characters.</p>";
		}
	}
	
	//Email
	if (!isset($_POST["email"])) {
		header("location:enquire.php");
		exit();
	}
	else{
		$email=$_POST["email"];
		$email=sanitise_input($email);
		if ($email=="") {
			$err_msg .= "<p>Please enter your email.</p>";
		}
	}

	//Street Address
	if (!isset($_POST["street_address"])) {
		header("location:enquire.php");
		exit();
	}
	else{
		$streetAddress=$_POST["street_address"];
		$streetAddress=sanitise_input($streetAddress);
		if ($streetAddress=="") {
			$err_msg .= "<p>Please enter your street address.</p>";
		}
	}

	//Suburb
	if (!isset($_POST["suburb"])) {
		header("location:enquire.php");
		exit();
	}
	else{
		$suburb=$_POST["suburb"];
		$suburb=sanitise_input($suburb);
		if ($suburb=="") {
			$err_msg .= "<p>Please enter your suburb.</p>";
		}
		elseif (!preg_match("/[A-Za-z]+/",$suburb)) {
			$err_msg .= "<p>Suburb can only alpha characters.</p>";
		}
	}

	//State
	if (!isset($_POST["state"])) {
		header("location:enquire.php");
		exit();
	}
	else{
		$state=$_POST["state"];
		$state=sanitise_input($state);
		if ($state==" -- select -- ") {
			$err_msg .= "<p>Please select your state.</p>";
		}
	}

	//Postcode
	if (!isset($_POST["postcode"])) {
		header("location:enquire.php");
		exit();
	}
	else{
		$postcode=$_POST["postcode"];
		$postcode=sanitise_input($postcode);
		if ($postcode=="") {
			$err_msg .= "<p>Please enter your postcode.</p>";
		}
		elseif (!preg_match("/^(\d{4})$/",$postcode)) {
			$err_msg .= "<p>Postcode is invalid</p>";
		}
		if ($state=='VIC' && !preg_match("/^3|^8/",$postcode)) {
			$err_msg .= "<p>A postcode for Victoria must start with 3 or 8.</p>";
		}
		elseif ($state=='NSW' && !preg_match("/^1|^2/",$postcode)) {
			$err_msg .= "<p>A postcode for NSW must start with 1 or 2.</p>";
		}
		elseif ($state=='QLD' && !preg_match("/^4|^9/",$postcode)) {
			$err_msg .= "<p>A postcode for QLD must start with 4 or 9.</p>";
		}
		elseif ($state=='NT' && !preg_match("/^0/",$postcode)) {
			$err_msg .= "<p>A postcode for Northern Territory must start with 0.</p>";
		}
		elseif ($state=='WA' && !preg_match("/^6/",$postcode)) {
			$err_msg .= "<p>A postcode for Western Australia must start with 6.</p>";
		}
		elseif ($state=='SA' && !preg_match("/^5/",$postcode)) {
			$err_msg .= "<p>A postcode for South Australia must start with 5.</p>";
		}
		elseif ($state=='TAS' && !preg_match("/^7/",$postcode)) {
			$err_msg .= "<p>A postcode for Tasmania must start with 7.</p>";
		}
		elseif ($state=='ACT' && !preg_match("/^0/",$postcode)) {
			$err_msg .= "<p>A postcode for ACT must start with 0.</p>";
		}
	}

	//Phone number
	if (!isset($_POST["phone"])) {
		header("location:enquire.php");
		exit();
	}
	else{
		$phoneNumber=$_POST["phone"];
		$phoneNumber=sanitise_input($phoneNumber);
		if ($phoneNumber=="") {
			$err_msg .= "<p>Please enter your phone number.</p>";
		}
		elseif (!preg_match("/^[0-9]{10}$/",$phoneNumber)) {
			$err_msg .= "<p>Please enter a valid 10 digit phone number.</p>";
		}
	}

	// Preferred Contact Method
	if (!isset($_POST["preferred-contact"])) {
		$contactMethodString="";
	}
	else {
		$contactMethod=$_POST["preferred-contact"];  // array
		$contactMethodString=implode(",",$contactMethod); //make the array a comma-separated string
		$contactMethodString=sanitise_input($contactMethodString);
	}

	//Pricing Plan
	if (!isset($_POST["pricing-plan"])) {
		header("location:enquire.php");
		exit();
	}
	else{
		$pricing=$_POST["pricing-plan"];
		$pricing=sanitise_input($pricing);
		if ($pricing=="0") {
			$err_msg .= "<p>Please select a pricing plan.</p>";
		}
	}

	//dayss to signup for
	if (!isset($_POST["dayss"])) {
		header("location:enquire.php");
		exit();
	}
	else {
		$dayss=$_POST["dayss"];
		$dayss=sanitise_input($dayss);
		if ($dayss=="") {
			$err_msg .= "<p>You must sign up for at least 10 dayss.</p>";
		}
		else if (!is_numeric($dayss)) {
			$err_msg .= "<p>Number of dayss is not numeric.</p>";
		}
		else {
			$dayss=(int)$dayss;
		}
	}

	//Product Features
	if (!isset($_POST["product-features"])) {
		$featuresString="";
	}
	else {
		$features=$_POST["product-features"];  // array
		$featuresString=implode(",",$features); //make the array a comma-separated string
		$featuresString=sanitise_input($featuresString);
	}

	//Comments
	if (!isset($_POST["comment"])) {
		header("location:enquire.php");
		exit();
	}
	else{
		$comment=$_POST["comment"];
		$comment=sanitise_input($comment);
	}

	//Card Number
	if (!isset($_POST["card-number"])) {
		header("location:enquire.php");
		exit();
	}
	else {
		$cardNumber=$_POST["card-number"];
		$cardNumber=sanitise_input($cardNumber);
		if ($cardNumber=="") {
			$err_msg .= "<p>You must enter your card number.</p>";
		}
		else if (!is_numeric($cardNumber)) {
			$err_msg .= "<p>Card number is not numeric.</p>";
		}
		else {
			$cardNumber=(int)$cardNumber;
		}
	}


	//Card Type
	if (!isset($_POST["card-type"])) {
		header("location:enquire.php");
		exit();
	}
	else{
		$cardType=$_POST["card-type"];
		$cardType=sanitise_input($cardType);
		if ($cardType=="0") {
			$err_msg .= "<p>Please select a card type.</p>";
		}
		elseif ($cardType == "Visa" && (!preg_match("/^4[0-9]{12}(?:[0-9]{3})?$/", $cardNumber))) {
			$err_msg .= "<p>Visa card number must have 16 digits and should start with 4. </p>";
		}
		elseif ($cardType == "Master card" && (!preg_match("/^5[1-5][0-9]{14}$/", $cardNumber))) {
			$err_msg .= "<p>Mastercard card number must have 16 digits and should start with digits 51 through to 55. </p>";
		}
		elseif ($cardType == "Amex" && (!preg_match("/^3[4,7][0-9]{13}$/", $cardNumber))) {
			$err_msg .= "<p>An American Express card number must have 15 digits and should start with 34 or 37. </p>";
		}
	}

	//Card Name
	if (!isset($_POST["name-on-card"])) {
		header("location:enquire.php");
		exit();
	}
	else{
		$cardName=$_POST["name-on-card"];
		$cardName=sanitise_input($cardName);
		if ($cardName=="") {
			$err_msg .= "<p>Please enter your card name.</p>";
		}
		else if (!preg_match("/[A-Za-z]+/",$cardName)) {
			$err_msg .= "<p>Card name can only contain alpha characters.</p>";
		}
	}

	//Card expiry month
	if (!isset($_POST["month-expiry"])) {
		header("location:enquire.php");
		exit();
	}
	else {
		$monthExpiry=$_POST["month-expiry"];
		$monthExpiry=sanitise_input($monthExpiry);
		if ($monthExpiry=="") {
			$err_msg .= "<p>Please enter the card expiry month</p>";
		}
		else if (!is_numeric($monthExpiry)) {
			$err_msg .= "<p>Card expiry month is not numeric.</p>";
		}
		else if ($monthExpiry > 12) {
			$err_msg .= "<p>There are only 12 months in a year.</p>";
		}
		else {
			$monthExpiry=(int)$monthExpiry;
		}
	}

	//Card expiry year
	if (!isset($_POST["year-expiry"])) {
		header("location:enquire.php");
		exit();
	}
	else {
		$yearExpiry=$_POST["year-expiry"];
		$yearExpiry=sanitise_input($yearExpiry);
		if ($yearExpiry=="") {
			$err_msg .= "<p>Please enter the card expiry year</p>";
		}
		else if (!is_numeric($yearExpiry)) {
			$err_msg .= "<p>Card expiry year is not numeric.</p>";
		}
		else if ($yearExpiry <= 21) {
			$err_msg .= "<p>Your card has expired.</p>";
		}
		else if ($yearExpiry > 41) {
			$err_msg .= "<p>Please check your card expiry year, it can't expire that far in the future.</p>";
		}
		else {
			$yearExpiry=(int)$yearExpiry;
		}
	}

	//CVV
	if (!isset($_POST["cvv"])) {
		header("location:enquire.php");
		exit();
	}
	else {
		$cvv=$_POST["cvv"];
		$cvv=sanitise_input($cvv);
		if ($cvv=="") {
			$err_msg .= "<p>Please enter the card's cvv.</p>";
		}
		else if (!is_numeric($cvv)) {
			$err_msg .= "<p>CVV is not numeric.</p>";
		}
		else if ($cvv > 999) {
			$err_msg .= "<p>CVV must be 3 numbers long</p>";
		}
		else if ($cvv < 100) {
			$err_msg .= "<p>CVV must be 3 numbers long</p>";
		}
		else {
			$cvv=(int)$cvv;
		}
	}

	// calculate cost
	if ($pricing == "Lisbon to Rome: $224.90 / day") {
		$plan = 224.90;
	}
	elseif ($pricing == "London to Copenhagen: $274.92 / day") {
		$plan = 274.92;
	}
	elseif ($pricing == "Singapore to Sydney: $192.45 / day") {
		$plan = 192.45;
	}
	elseif ($pricing == "Newyork to Stockholm: $311.50 / day") {
		$plan = 311.50;
	}
	$cost = $plan * $dayss;

	//If there are errors, redirect to fix_order.php
	if ($err_msg!=""){
		// pass the name-value pairs via session, pass the err_msg using query string
		// you can use other methods
		session_start();
		$_SESSION['firstName'] = $firstName;
		$_SESSION['lastName'] = $lastName;
		$_SESSION['email'] = $email;
		$_SESSION['suburb'] = $suburb;
		$_SESSION['state'] = $state;
		$_SESSION['postcode'] = $postcode;
		$_SESSION['streetAddress'] = $streetAddress;
		$_SESSION['phone'] = $phoneNumber;
		$_SESSION['contactMethodString'] = $contactMethodString;
		$_SESSION['pricingText'] = $pricing;
		$_SESSION['dayss'] = $dayss;
		$_SESSION['featuresString'] = $featuresString;
		$_SESSION['comment'] = $comment;
		$_SESSION['cost'] = $cost;

		header("location:fix_order.php?err_msg=$err_msg");
		exit();
	}

	// If no error, insert into database , redirect to receipt.php
	$db_msg="";
	require_once "settings.php";
	$conn = mysqli_connect ($host,$user,$pwd,$sql_db);

	if ($conn) { 		// create table if it doesn't exist
		$query = "CREATE TABLE IF NOT EXISTS orders (
					order_id INT AUTO_INCREMENT PRIMARY KEY,
					first_name VARCHAR(25),
					last_name VARCHAR(25),
					email VARCHAR(80),
					street_address VARCHAR(40),
					suburb 	varchar(20),
					stateText varchar(5),
					postcode SMALLINT(4),
					phone BIGINT(10),
					preferred_contact VARCHAR(20),
					pricing_plan VARCHAR(50),
					dayss smallint(2), 
					product_features VARCHAR(40),
					comment TINYTEXT,
					card_type VARCHAR (20),
					name_card VARCHAR (50),
					card_number BIGINT(16),
					month_expiry tinyint(2),
					year_expiry tinyint(2),
					cvv smallint(3),
					order_cost DECIMAL(10,2),
					order_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
					order_status enum('PENDING', 'PAID', 'FULFILLED', 'ARCHIVED') DEFAULT 'PENDING'
					);";

		$result = mysqli_query ($conn, $query);
		if ($result) {	// create table successful

			// insert
			$query = "INSERT INTO orders (first_name, last_name, email, street_address, suburb, stateText, postcode, phone, preferred_contact,
					pricing_plan, dayss, product_features, comment, card_type, name_card, card_number, month_expiry, year_expiry, cvv, order_cost)
					VALUES ('$firstName','$lastName', '$email', '$streetAddress', '$suburb', '$state', '$postcode', '$phoneNumber', '$contactMethodString', '$pricing', '$dayss', '$featuresString','$comment','$cardType', '$cardName', '$cardNumber', '$monthExpiry', '$yearExpiry', '$cvv','$cost');";
			$insert_result = mysqli_query ($conn, $query);

			if ($insert_result) {	//   insert successfully
				$date = date('Y-m-d H:i:s');
				function getTruncatedCVV($cvv){
					return substr_replace($cvv, str_repeat("*",3),0);
				}
				$cvc = getTruncatedCVV($cvv);
				function getTruncatedCCNumber($cardNumber){
					return str_replace(range(0,9), "*", substr($cardNumber, 0, -4)) .  substr($cardNumber, -4);
				}
				$ccnum = getTruncatedCCNumber($cardNumber);
				$db_msg="<table class='row d-flex justify-content-center'><tr><th>Name</th><th>Value</th></tr>"
						. "<tr><th>Order ID</th><td>" . mysqli_insert_id($conn) . "</td></tr>"
						. "<tr><th>First Name</th><td>$firstName</td></tr>"
						. "<tr><th>Last Name</th><td>$lastName</td></tr>"
						. "<tr><th>Email</th><td>$email</td></tr>"
						. "<tr><th>Street Address</th><td>$streetAddress</td></tr>"
						. "<tr><th>Suburb</th><td>$suburb</td></tr>"
						. "<tr><th>State</th><td>$state</td></tr>"
						. "<tr><th>Postcode</th><td>$postcode</td></tr>"
						. "<tr><th>Phone Number</th><td>$phoneNumber</td></tr>"
						. "<tr><th>Preferred Contact Method</th><td>$contactMethodString</td></tr>"
						. "<tr><th>Pricing Plan</th><td>$pricing</td></tr>"
						. "<tr><th>Number of days</th><td>$dayss</td></tr>"
						. "<tr><th>Additional Features</th><td>$featuresString</td></tr>"
						. "<tr><th>Additional Comment</th><td>$comment</td></tr>"
						. "<tr><th>Card Type</th><td>$cardType</td></tr>"
						. "<tr><th>Name on Card</th><td>$cardName</td></tr>"
						. "<tr><th>Card Number</th><td>$ccnum</td></tr>"
						. "<tr><th>Expiry Month</th><td>$monthExpiry</td></tr>"
						. "<tr><th>Expiry Year</th><td>$yearExpiry</td></tr>"
						. "<tr><th>CVV</th><td>$cvc</td></tr>"
						. "<tr><th>Total Cost</th><td>$$cost</td></tr>"
						. "<tr><th>Status</th><td>PENDING</td></tr>"
						. "<tr><th>Order Time</th><td>$date</td></tr>"
						. "</table>";

			} else {
				$db_msg= "<p>Insert unsuccessful.</p>";
			}
		} else {
			$db_msg= "<p>Create table operation unsuccessful.</p>";
		}
		mysqli_close ($conn);					// Close the database connect
	} else {
		$db_msg= "<p>Unable to connect to the database.</p>";
	}
	//  redirect to receipt.php
	//echo $db_msg;
	header("location:receipt.php?db_msg=$db_msg");


?>
