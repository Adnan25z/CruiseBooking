<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <?php include('./includes/header.inc'); ?>
  <!-- JavaScript -->
  <script src="scripts/part2.js"></script>
  <script src="scripts/enhancements.js"></script>
</head>

<body>
  <section class="colored-section">
    <!-- Nav Bar -->
    <header>
      <?php include('./includes/nav.inc') ?>
    </header>

    <div class="container">
      <form class="form" id="payment_form" action="process_order.php" method="post" novalidate="novalidate">
        <div class="row">
          <div class="col-lg-6">
            <h3 class="col-form-label-lg">Your Order Details:</h3>

            <label for="first-name">First Name:</label>
            <input class="form-control" type="text" name="first-name" id="first-name" pattern="[A-Za-z]+" maxlength="25" size="25" required="required" readonly />

            <label for="last-name">Last Name:</label>
            <input class="form-control" type="text" name="last-name" id="last-name" pattern="[A-Za-z]+" maxlength="25" size="25" required="required" readonly />

            <label for="email">Email:</label>
            <input class="form-control" type="email" name="email" id="email" maxlength="25" size="25" required="required" readonly />

            <div class="form-group">
              <label for="full-address">Full Address:</label>
              <p><span class="form-control" id="full-address" readonly></span></p>
              <input class="form-control" type="text" name="street_address" id="street_address" maxlength="40" size="40" required="required" hidden />
              <input class="form-control" type="text" name="suburb" id="suburb" maxlength="20" size="20" required="required" hidden />
              <select class="form-control" id="state" name="state" hidden>
                <option disabled selected value> -- select -- </option>
                <option value="VIC">VIC</option>
                <option value="NSW">NSW</option>
                <option value="QLD">QLD</option>
                <option value="NT">NT</option>
                <option value="WA">WA</option>
                <option value="SA">SA</option>
                <option value="TAS">TAS</option>
                <option value="ACT">ACT</option>
              </select>
              <input class="form-control" type="number" name="postcode" id="postcode" min="1000" max="9999" required="required" hidden />
            </div>

            <label for="phone">Phone Number:</label>
            <input class="form-control" type="tel" name="phone" id="phone" maxlength="10" size="10" required="required" readonly/>

            <div class="form-group">
              <label>Preferred Contact Method:</label><br />

              <input type="radio" value="Post" name="preferred-contact[]" id="radpost" required="required" class="readonly" />
              <label for="radpost" id="readonly1">Post</label>

              <input type="radio" value="Email" name="preferred-contact[]" id="rademail" required="required" class="readonly" />
              <label for="rademail" id="readonly2">Email</label>

              <input type="radio" value="Phone" name="preferred-contact[]" id="radphone" required="required" class="readonly" />
              <label for="radphone" id="readonly3">Phone</label>
            </div>

            <label for="books">Pricing Plan:</label>
            <input type=text class="form-control" id="books" name="pricing-plan" readonly />

            <label for="months">Number of days to Enjoy:</label>
            <input class="form-control" type="number" name="dayss" id="days" readonly/>

            <div class="form-group">
              <label for="personalised">Product Features:</label><br />

              <input type="checkbox" value="Cabin/Suite" name="product-features[]" id="personalised" class="readonly" />
              <label id="readonly4" for="personalised">Cabin/Suite</label>

              <input type="checkbox" value="Provisioning" name="product-features[]" id="Provisioning" class="readonly" />
              <label id="readonly5" for="Provisioning">Provisioning</label>

              <input type="checkbox" value="Cruise Highlights" name="product-features[]" id="Highlights" class="readonly" />
              <label id="readonly6" for="Highlights">Cruise Highlights</label>
            </div>
            <div class="form-group" id="additional-comments">
              <label for="subject">Additional Comments:</label>
              <textarea id="subject" name="comment" rows="3" class="form-control" readonly></textarea>
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
                  <input class="form-control" type="text" name="totalCost" id="totalCost" readonly />
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

  <footer class="colored-section" id="footer">
    <?php include('./includes/footer.inc') ?>
  </footer>
</body>

</html>
