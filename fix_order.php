<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('./includes/header.inc'); ?>
  <script src="scripts/part2.js"></script>
  <script src="scripts/enhancements.js"></script>
</head>
<!-- Body begin -->
<body>
   <!-- Navigation -->
   <section class="colored-section">
     <header id="nav-bar">
      <?php include('./includes/nav.inc') ?>
     </header>
   </section>

<?php
	//If not from process_order.php, redirect to enquire
	if (!isset($_GET["err_msg"])) {
		header("location:enquire.php");
		exit();
	}

	// **********************   from process_order.php
	// display error message
	echo "<div class='error'>";
	echo $_GET["err_msg"];
	echo "</div>";
	// get values
	session_start();
	if (isset($_SESSION["firstName"]))    // first name
		$firstName=$_SESSION["firstName"];
	else
		$firstName="";

	if (isset($_SESSION["lastName"]))    // last name
		$lastName=$_SESSION["lastName"];
	else
		$lastName="";

	if (isset($_SESSION["email"]))    // email
		$email=$_SESSION["email"];
	else
		$email="";

	if (isset($_SESSION["suburb"]))    // suburb
		$suburb=$_SESSION["suburb"];
	else
		$suburb="";

	if (isset($_SESSION["state"]))    // state
		$state=$_SESSION["state"];
	else
		$state=" -- select -- ";

	if (isset($_SESSION["postcode"]))    // postcode
		$postcode=$_SESSION["postcode"];
	else
		$postcode="";

	if (isset($_SESSION["streetAddress"]))    // streetAddress
		$streetAddress=$_SESSION["streetAddress"];
	else
		$streetAddress="";

	if (isset($_SESSION["phone"]))    // phone
		$phoneNumber=$_SESSION["phone"];
	else
		$phoneNumber="";

	if (isset($_SESSION["phone"]))    // phone
		$phoneNumber=$_SESSION["phone"];
	else
		$phoneNumber="";

	if (isset($_SESSION["contactMethodString"]))   // pref contact method
		$contactMethodString=$_SESSION["contactMethodString"];
	else
		$contactMethodString=0;

	if (isset($_SESSION["pricingText"]))    // pricing plan
		$pricing=$_SESSION["pricingText"];
	else
		$pricing=" -- select -- ";

	if (isset($_SESSION["dayss"]))    // months
		$dayss=$_SESSION["dayss"];
	else
		$dayss="";

	if (isset($_SESSION["featuresString"]))    // additional features
		$featuresString=$_SESSION["featuresString"];
	else
		$featuresString="0";

	if (isset($_SESSION["cost"]))    // cost
		$cost=$_SESSION["cost"];
	else
		$cost="";



	$post = (strpos($contactMethodString,"Post")!==false); //if $contactMethodString contains 'post' then $post is true
	$emailMethod = (strpos($contactMethodString,"Email")!==false);
	$phoneMethod = (strpos($contactMethodString,"Phone")!==false);

	$cabin = (strpos($featuresString,"Cabin/Suite")!==false); //if $featuresString contains 'personalised' then $cabin is true
	$provisioning = (strpos($featuresString,"Provisioning")!==false);
	$cruiseHighlights = (strpos($featuresString,"Cruise Highlights")!==false);

	$lisbtorome = (strpos($pricing,"Lisbon to Rome: $224.90 / day")!==false); //if $featuresString contains this then $lisbtorome is true
	$lontocop = (strpos($pricing,"London to Copenhagen: $274.92 / day")!==false);
	$singtosyd = (strpos($pricing,"Singapore to Sydney: $192.45 / day")!==false);
  $newtostoc = (strpos($pricing,"Newyork to Stockholm: $311.50 / day")!==false);

	$vic = (strpos($state,"VIC")!==false); //if $featuresString contains 'basic' then $lisbtorome is true
	$nsw = (strpos($state,"NSW")!==false);
	$qld = (strpos($state,"QLD")!==false);
	$nt = (strpos($state,"NT")!==false); //if $featuresString contains 'basic' then $lisbtorome is true
	$wa = (strpos($state,"WA")!==false);
	$sa = (strpos($state,"SA")!==false);
	$tas = (strpos($state,"TAS")!==false);
	$act = (strpos($state,"ACT")!==false);

?>
	<!-- Contact Form -->
    <section class="colored-section">
    <div class="container">
      <div class="container">
        <form class="form" id="payment_form" action="process_order.php" method="post" novalidate="novalidate">
          <div class="row">
            <div class="col-lg-6">
              <h3 class="col-form-label-lg">Your Order Details:</h3>

              <label for="first-name">First Name:</label>
              <input class="form-control" type="text" name="first-name" id="first-name" pattern="[A-Za-z]+" maxlength="25" size="25" required="required" value="<?php echo $firstName; ?>"  />

              <label for="last-name">Last Name:</label>
              <input class="form-control" type="text" name="last-name" id="last-name" pattern="[A-Za-z]+" maxlength="25" size="25" required="required" value="<?php echo $lastName; ?>" />

              <label for="email">E-mail:</label>
              <input class="form-control" type="email" name="email" id="email" maxlength="25" size="25" required="required" value="<?php echo $email; ?>" />

              <label for="street_address">Street Address:</label>
              <input class="form-control" type="text" name="street_address" id="street_addres" maxlength="40" size="40" required="required" value="<?php echo $streetAddress; ?>" />

              <label for="suburb">Suburb/Town:</label>
              <input class="form-control" type="text" name="suburb" id="sub" maxlength="20" size="20" required="required" value="<?php echo $suburb; ?>" />

              <div class="form-group">
                  <label for="state">State:</label>
                  <select class="form-control" id="state" name="state" value="<?php echo $state; ?>" >
                      <option disabled selected value> -- select -- </option>
                      <option value="VIC" <?php echo ($vic)?"selected":"";  ?> >VIC</option>
                      <option value="NSW" <?php echo ($nsw)?"selected":"";  ?> >NSW</option>
                      <option value="QLD" <?php echo ($qld)?"selected":"";  ?> >QLD</option>
                      <option value="NT" <?php echo ($nt)?"selected":"";  ?> >NT</option>
                      <option value="WA" <?php echo ($wa)?"selected":"";  ?> >WA</option>
                      <option value="SA" <?php echo ($sa)?"selected":"";  ?> >SA</option>
                      <option value="TAS" <?php echo ($tas)?"selected":"";  ?> >TAS</option>
                      <option value="ACT" <?php echo ($act)?"selected":"";  ?> >ACT</option>
                  </select>
              </div>

              <label for="postcode">Postcode:</label>
              <input class="form-control" type="number" name="postcode" id="postcod" min="1000" max="9999" required="required" value="<?php echo $postcode; ?>" />

              <label for="phone">Phone Number:</label>
              <input class="form-control" type="tel" name="phone" id="phone" maxlength="10" size="10" required="required" value="<?php echo $phoneNumber; ?>" />

              <div class="form-group">
                <label>Preferred Contact Method:</label><br />

                <input type="radio" value="Post" name="preferred-contact[]" id="radpost" required="required"  <?php echo ($post)?"checked":"";  ?> />
                <label for="radpost" id="readonly1">Post</label>

                <input type="radio" value="Email" name="preferred-contact[]" id="rademail" required="required" <?php echo ($emailMethod)?"checked":"";  ?> />
                <label for="rademail" id="readonly2">Email</label>

                <input type="radio" value="Phone" name="preferred-contact[]" id="radphone" required="required" <?php echo ($phoneMethod)?"checked":"";  ?> />
                <label for="radphone" id="readonly3">Phone</label>
              </div>

              <div class="form-group">
                <label for="pricing-plan">Pricing Plan:</label>
                <select class="form-control" id="books" name="pricing-plan" value="<?php echo $pricing; ?>" >
                    <option disabled selected value> -- select -- </option>
                    <option value="Lisbon to Rome: $224.90 / day" <?php echo ($lisbtorome)?"selected":"";  ?> >Lisbon to Rome: $224.90 / day</option>
                    <option value="London to Copenhagen: $274.92 / day"  <?php echo ($lontocop)?"selected":"";  ?> >London to Copenhagen: $274.92 / day</option>
                    <option value="Singapore to Sydney: $192.45 / day"  <?php echo ($singtosyd)?"selected":"";  ?> >Singapore to Sydney: $192.45 / day</option>
                    <option value="Newyork to Stockholm: $311.50 / day" <?php echo ($newtostoc)?"selected":"";  ?> >Newyork to Stockholm: $311.50 / day</option>
                </select>
              </div>

              <label for="days">Number of days to Enjoy:</label>
              <input class="form-control" type="number" name="dayss" id="days"  value="<?php echo $dayss; ?>"/>

              <div class="form-group">
                <label for="personalised">Product Features:</label><br />

                <input type="checkbox" value="Cabin/Suite" name="product-features[]" id="personalised"  <?php echo ($cabin)?"checked":"";  ?> />
                <label id="readonly4" for="personalised">Cabin/Suite</label>

                <input type="checkbox" value="Provisioning" name="product-features[]" id="Provisioning"  <?php echo ($provisioning)?"checked":"";  ?> />
                <label id="readonly5" for="Provisioning">Provisioning</label>

                <input type="checkbox" value="Cruise Highlights" name="product-features[]" id="Highlights"  <?php echo ($cruiseHighlights)?"checked":"";  ?> />
                <label id="readonly6" for="Highlights">Cruise Highlights</label>
              </div>
              <div class="form-group" id="additional-comments">
                <label for="subject">Additional Comments:</label>
                <textarea id="subject" name="comment" rows="3" class="form-control" placeholder="Your comment here..." value="<?php echo $comment; ?>"></textarea>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="wrapper">
                <p class="parahighlight" id="timer"></p>
                <div class="payment">
                  <div class="payment-logo">
                    <p>C</p>
                  </div>
                  <h2>Payment Gateway</h2>
                  <label class="labelexc" for="card">Accepted Cards</label>
                  <select class="input" id="card" name="card-type">
                    <option disabled selected value="0">---Please Select---</option>
                    <option value="Visa">Visa</option>
                    <option value="Master card">Mastercard</option>
                    <option value="Amex">American Express</option>
                  </select>
                  <div class="icon-container">
                    <i class="fa fa-cc-visa"></i>
                    <i class="fa fa-cc-amex"></i>
                    <i class="fa fa-cc-mastercard"></i>
                  </div>
                  <div class="card space icon-relative">
                    <label class="label" for="cardholder">Card Holder:</label>
                    <input type="text" id="cardholder" class="input" name="name-on-card" pattern="^[A-Za-z ]+$" maxlength="40" placeholder="Your Name...">
                    <i class="fas fa-user"></i>
                  </div>

                  <div class="card space icon-relative">
                    <label class="label" for="cardNumber">Card Number:</label>
                    <input type="text" id="cardNumber" class="input" name="card-number" pattern="[0-9]{15,16}" placeholder="XXXX-XXXX-XXXX-XXXX" maxlength="16">
                    <i class="far fa-credit-card"></i>
                  </div>

                  <div class="card-grp space">
                    <div class="card-item icon-relative grp">
                      <label class="label">Expiry:</label>
                      <input type="text" id="expirym" class="input1" name="month-expiry" placeholder="MM" pattern="0[1-9]|1[012]" maxlength="2">
                      <i class="fas fa-calendar-alt"></i>
                    </div>

                    <div class="card-item icon-relative grp">
                      <input type="text" name="year-expiry" id="expiryy" class="input1" placeholder="YY" pattern="[0-9]{2}" maxlength="2">
                    </div>

                    <div class="card-item icon-relative">
                      <label class="label" for="cvv">CVV:</label>
                      <input type="text" id="cvv" class="input" name="cvv" placeholder="000" pattern="^[0-9]+$" maxlength="3">
                      <i class="fas fa-lock"></i>
                    </div>
                  </div>

                  <div class="card space">
                    <label class="label" for="totalCost"><strong>Total:</strong></label>
                    <input class="form-control" type="text" name="totalCost" id="totalCost" value="<?php echo $cost; ?>" readonly />
                  </div>
                  <input id="btns1" type="reset" value="Reset">
                  <input id="btns" name="payButton" type="submit" value="Check Out">
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>
   <!-- Footer -->
	<footer class="colored-section">
    <?php include('./includes/footer.inc') ?>
	</footer>
</body>
</html>
