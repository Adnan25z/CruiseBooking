<!DOCTYPE html>
<html lang="en">

<head>
  <?php include ('./includes/header.inc'); ?>
  <script src="scripts/part2.js"></script>
  <script src="scripts/enhancements.js"></script>
</head>
<!-- Body begin -->

<body>
  <!-- Navigation -->
  <section class="colored-section" id="title">
    <!-- Nav Bar -->
    <header>
      <?php include ('./includes/nav.inc'); ?>
    </header>
  </section>
  <section id="white-section">
    <div class="table-responsive">
	  <br>
      <h2>Manager</h2>
      <?php
      //date_default_timezone_set('Asia/Calcutta'); - You can choose any timezone
      //Calculate 60 days in the future
      //seconds * minutes * hours * days + current time
 
     $inTwoMonths = 60 * 60 * 24 * 60 + time();
     setcookie('lastVisit', date("G:i - m/d/y"), $inTwoMonths);
     if(isset($_COOKIE['lastVisit']))
     {
       $visit = $_COOKIE['lastVisit'];
       echo "Your last visit was - ". $visit;
     }
     else
       echo "You've got some stale cookies!";
    ?>

	  <br>
      <?php
      session_start();
      if(isset($_SESSION['pricingText']))
      {
        $cruise = $_SESSION['pricingText'];
      }
      else
      {
        $cruise = "";
      }
if (!isset($_POST["fn"]) && !isset($_POST["ln"]) && !isset($_POST["pp"])) $query = "SELECT * FROM orders;";
else
{
    $fn = trim($_POST["fn"]);
    $ln = trim($_POST["ln"]);
    if (isset($_POST['pp']))
    {
        $pp = $_POST['pp'];
    }
    else
    {
        $pp = "";
    }
    if (isset($_POST['os']))
    {
        $os = $_POST['os'];
    }
    else
    {
        $os = "";
    }
    if (isset($_POST['sort']))
    {
        $sort = ($_POST['sort']);
    }
    else
    {
        $sort = "";
    }
   /* if (isset($_POST['df']))
    {
        $df = ($_POST['df']);
    }
    else
    {
        $df = "";
    }
    if (isset($_POST['dt']))
    {
        $dt = ($_POST['dt']);
    }
    else
    {
        $dt = "";
    }*/
    $query = "SELECT * FROM orders WHERE first_name LIKE '%$fn%' and last_name LIKE '%$ln%' and pricing_plan LIKE '%$pp%' and order_status LIKE '%$os%' ORDER BY order_cost $sort";

}

require_once "settings.php"; // Load MySQL log in credentials
$conn = mysqli_connect($host, $user, $pwd, $sql_db); // Log in and use database
if ($conn)
{ // connected
    $result = mysqli_query($conn, $query);
    if ($result)
    { //   query was successfully executed
        $record = mysqli_fetch_assoc($result);
        if ($record)
        { //   record exists
            echo "<table class='table-responsive text-center table-bordered' id='managerTable'>";
            echo "<tr><th>Delete</th><th>Order ID</th><th>First Name</th><th>Last Name</th>
			<th>Pricing Plan</th><th>Number of Days</th><th>Order Cost</th><th>Order Time</th><th>Order Status</th><th>Change Status</th></tr>";
            while ($record)
            {
                if ($record['order_status'] == 'PENDING')
                {
                    echo "<tr><td><a class=\"btn btn-primary\" href='delete.php?id=" . $record['order_id'] . "'>Delete</a></td>";
                }
                else
                {
                    echo "<tr><td></td>";
                }
                echo "<td>{$record['order_id']}</td>";
                echo "<td>{$record['first_name']}</td>";
                echo "<td>{$record['last_name']}</td>";
               /* echo "<td>{$record['email']}</td>";
                echo "<td>{$record['street_address']}</td>";
                echo "<td>{$record['suburb']}</td>";
                echo "<td>{$record['stateText']}</td>";
                echo "<td>{$record['postcode']}</td>";
                echo "<td>{$record['phone']}</td>";
                echo "<td>{$record['preferred_contact']}</td>";*/
                echo "<td>{$record['pricing_plan']}</td>";
                echo "<td>{$record['dayss']}</td>";
               /* echo "<td>{$record['product_features']}</td>";
                echo "<td>{$record['comment']}</td>"; */
                echo "<td>{$record['order_cost']}</td>";
                echo "<td>{$record['order_time']}</td>";
                echo "<td>{$record['order_status']}</td>";
                echo "<td><form action='update.php' method='post'>
					<input type='hidden' name='order_id' value='" . $record["order_id"] . "'/>
					<select class='form-control' id='order_status' name='order_status' onchange='submit();'>
					<option disabled selected value> -- select -- </option>
					<option value='PENDING'>PENDING</option>
					<option value='PAID'>PAID</option>
					<option value='FULFILLED'>FULFILLED</option>
					<option value='ARCHIVED'>ARCHIVED</option>
					</select></form></td></>";
                $record = mysqli_fetch_assoc($result);
            }
            echo "</table>";
            mysqli_free_result($result);
        }
        else
        {
            echo "<p class=\"text-center\">No record found.</p>";
        }
    }
    else
    {
        echo "<p>Orders table doesn't exist or select operation unsuccessful.</p>";
    }
    mysqli_close($conn); // Close the database connection
    
}
else
{
    echo "<p>Unable to connect to the database.</p>";
}
require_once "settings.php"; // Load MySQL log in credentials
$conn = mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT AVG( orders_num ) FROM ( SELECT order_time, COUNT( DISTINCT order_id ) orders_num FROM `orders` GROUP BY CAST( order_time AS DATE ) )orders_per_day";

$result = mysqli_query($conn, $sql);
if ($result)
{
    mysqli_close($conn);
    $record = mysqli_fetch_assoc($result);
    $avgOrders = $record['AVG( orders_num )'];
    $avgOrders = round($avgOrders, 2);
    echo "<p class=\"text-center\">Average number of orders today (Overall): $avgOrders</p>";
}
else
{
    echo "Error calculating";
}
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
<br>
<?php
require_once ("settings.php");    // Load MySQL log in credentials
$conn = mysqli_connect ($host,$user,$pwd,$sql_db);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT pricing_plan, COUNT(pricing_plan) AS MOST_FREQUENT from orders GROUP BY pricing_plan ORDER BY COUNT(pricing_plan) DESC";

$result = mysqli_query($conn, $sql);
  if ($result) {
    mysqli_close($conn);
    echo "<p class=\"text-center\">Most Popular product today (Overall): $cruise</p>";
  }
  else {
    echo "Error displaying popular product";
  }
?>
<br>

    </div>
  </section>
  <section class="colored-section">
    <div class="container">
      <h2>Search Orders</h2>
	  <br>
      <form action="manager.php" method="post">
        <div class="form-group">
          <label for="fn">First Name:</label>
          <input class="form-con" type="text" name="fn" id="fn" pattern="[A-Za-z]+" maxlength="25" size="25" />
        </div>
        <div class="form-group">
          <label for="ln">Last Name:</label>
          <input class="form-con" type="text" name="ln" id="ln" pattern="[A-Za-z]+" maxlength="25" size="25" />
        </div>
      <!--  <div class="row">
          <div class="form-group col-md-6">
            <label for="date">Date From:</label>
            <input class="form-control" type="date" id="df" name="df">
          </div>
          <div class="form-group col-md-6">
            <label for="date">Date Until:</label>
            <input class="form-control" type="date" id="dt" name="dt">
          </div>
        </div> -->
        <div class="form-group">
          <label for="pp">Pricing Plan:</label>
          <select class="form-control" id="pp" name="pp">
            <option disabled selected value> -- select -- </option>
            <option value="Lisbon to Rome: $224.90 / day">Lisbon to Rome: $224.90 / day</option>
            <option value="London to Copenhagen: $274.92 / day">London to Copenhagen: $274.92 / day</option>
            <option value="Singapore to Sydney: $192.45 / day">Singapore to Sydney: $192.45 / day</option>
            <option value="Newyork to Stockholm: $311.50 / day">Newyork to Stockholm: $311.50 / day</option>
          </select>
        </div>
        <div class="form-group">
          <label for="os">Order Status:</label>
          <select class="form-control" id="os" name="os">
            <option disabled selected value> -- select -- </option>
            <option value="PENDING">PENDING</option>
            <option value="PAID">PAID</option>
            <option value="FULFILLED">FULFILLED</option>
            <option value="ARCHIVED">ARCHIVED</option>
          </select>
        </div>
        <div class="form-group">
          <label for="sort">Sort Order Total:</label>
          <select class="form-control" id="sort" name="sort">
            <option disabled selected value> -- select -- </option>
            <option value="ASC">ASC</option>
            <option value="DESC">DESC</option>
          </select>
        </div>
        <button type="submit" name="searchButton" class="btn btn-primary">Search</button>
      </form>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <section class="white-section">
      <?php include ('./includes/footer.inc') ?>
	</section>
  </footer>
</body>

</html>
