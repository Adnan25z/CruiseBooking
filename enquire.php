<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <?php include('./includes/header.inc');
  $page = "enquiry"; ?>
  <script src="scripts/part2.js"></script>
</head>

<body>
  <section class="colored-section" id="title">
    <!-- Nav Bar -->
    <header>
      <?php include('./includes/nav.inc') ?>
    </header>

    <div class="formpage row">
      <div class="col-lg-6">
        <img class="formimg" src="images/img-01.webp" alt="Image not Found">
        <p> <a href="https://listimg.pinclipart.com/picdir/s/62-625097_png-file-svg-pluspng-fast-mail-icon-png.png">ref: Edited Mail image</a> </p>
        <div class="shop-items">
          <div class="shop-item">
            <span class="shop-item-title">Voyage 1</span>
            <img class="shop-item-image" src="images/lisb.webp" alt="Image not Found">>
          </div>
          <div class="shop-item">
            <span class="shop-item-title">Voyage 2</span>
            <img class="shop-item-image" src="images/lon-cop.webp" alt="Image not Found">>
          </div>
          <div class="shop-item">
            <span class="shop-item-title">Voyage 3</span>
            <img class="shop-item-image" src="images/sydney.webp" alt="Image not Found">>
          </div>
          <div class="shop-item">
            <span class="shop-item-title">Voyage 4</span>
            <img class="shop-item-image" src="images/newyork.webp" alt="Image not Found">>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <h1>Get in Touch</h1>
        <form method="post" id="enquiry_form" action="payment.php" novalidate>
          <!--Posting the data to payment.php page-->
          <label for="fnaam">First Name&nbsp;</label>
          <input type="text" id="fnaam" name="First-Name" placeholder="Your name.." pattern="^[A-Za-z]+$" maxlength="25">


          <label for="lnaam">&emsp;&emsp;Last Name&nbsp;</label>
          <input type="text" id="lnaam" name="Last-Name" placeholder="Your last name.." pattern="^[A-Za-z]+$" maxlength="25">

          <label for="email">E-mail</label>
          <input type="email" id="email" name="E-mail" placeholder="Your e-mail address..">
          <fieldset>
            <legend>Address</legend>
            <p class="parahighlight">
              <label for="street">Street &nbsp;</label>
              <input type="text" id="street" name="Street-Address" maxlength="40">
              <label for="town">&emsp;Suburb/Town&nbsp;</label>
              <input type="text" id="town" name="Suburb/Town" maxlength="20">
            </p>

            <p class="parahighlight">
              <label for="state"> State&emsp;</label>
              <select id="state" name="State">
                <option value="">---Please Select---</option>
                <option value="VIC">VIC</option>
                <option value="NSW">NSW</option>
                <option value="QLD">QLD</option>
                <option value="NT">NT</option>
                <option value="WA">WA</option>
                <option value="SA">SA</option>
                <option value="TAS">TAS</option>
                <option value="ACT">ACT</option>
              </select>

              <label for="postcode">&emsp;&emsp; Postcode&emsp;</label>
              <input type="text" id="postcode" name="Postcode" pattern="[0-9]{4,4}">
            </p>
          </fieldset>

          <br>

          <label for="phone">Phone Number &nbsp;</label>
          <input type="text" id="phone" name="Phone-Number" placeholder="Your phone number.." pattern="[0-9]{10,10}">
          <br>

          <fieldset>
            <legend>Preferred Contact</legend>
            <p class="parahighlight">
              <input type="radio" id="Email" name="Preferred Contact" value="E-Mail" />
              <label for="Email">E-Mail</label>
              <input type="radio" id="post" name="Preferred Contact" value="Post" />
              <label for="post">Post</label>
              <input type="radio" id="Phone" name="Preferred Contact" value="Phone" />
              <label for="Phone">Phone</label>
            </p>
          </fieldset>

          <fieldset>
            <legend>Features</legend>
            <p class="parahighlight">
              <label for="Cabin/Suite">Cabin/Suite</label>
              <input type="checkbox" id="Cabin/Suite" name="Features[]" value="Cabin/Suite" checked="checked" />
              <label for="Provisioning">Provisioning</label>
              <input type="checkbox" id="Provisioning" name="Features[]" value="Provisioning" />
              <label for="Cruise_Highlights">Cruise Highlights</label>
              <input type="checkbox" id="Cruise_Highlights" name="Features[]" value="Cruise_Highlights" />
            </p>
          </fieldset>

          <fieldset>
            <legend>Book now</legend>
            <label for="book">Choose a Cruise</label>
            <select class="bookings" id="book" name="Cruise_Booking">
              <option disabled selected value="0">-- Select --</option>
              <option value="Lisbon to Rome: $224.90 / day">Lisbon to Rome: $224.90 / day</option>
              <option value="London to Copenhagen: $274.92 / day">London to Copenhagen: $274.92 / day</option>
              <option value="Singapore to Sydney: $192.45 / day">Singapore to Sydney: $192.45 / day</option>
              <option value="Newyork to Stockholm: $311.50 / day">Newyork to Stockholm: $311.50 / day</option>
            </select>

            <label for="days">Select number of days to enjoy</label>
            <input type="number" name="days" id="days">
          </fieldset>

          <label for="subject">Subject</label>
          <textarea id="subject" name="subject" placeholder="Write your queries..." style="height:200px"></textarea>

          <input type="submit" value="Pay Now" />
        </form>
      </div>
    </div>
  </section>

  <footer class="colored-section" id="footer">
    <?php include('./includes/footer.inc') ?>
  </footer>

</body>

</html>
