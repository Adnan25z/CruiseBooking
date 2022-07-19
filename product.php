<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <?php include('./includes/header.inc'); ?>
</head>

<body>
  <section class="colored-section" id="title">
    <!-- Nav Bar -->
    <header>
      <?php include('./includes/nav.inc');
      $page = "course"; ?>
    </header>
  </section>

  <!-- Testimonials -->

  <section class="colored-section" id="testimonials">

    <div id="testimonial-carousel" class="carousel slide" data-ride="carousel">
      <!--using bootstrap carousel class to have a slideshow like page-->
      <div class="carousel-inner">
        <div class="carousel-item active container-fluid">
          <!--Using Bootstrap container fluid and carousel -->
          <h2 class="testimonial-text">"Throughout every challenge your team has been courteous, professional and delivered above-and-beyond service"</h2>
          <img class="testimonial-img" src="images/american-express.png" alt="american express">
          <em>American Express</em>
          <a href="https://en.wikipedia.org/wiki/American_Express#/media/File:American_Express_logo_(2018).svg">ref: American-express logo</a>
        </div>

        <div class="carousel-item container-fluid">
          <h2 class="testimonial-text">"You picked up on every detail imaginable from the beginning to end and made this the easiest program we've ever done"</h2>
          <img class="testimonial-img" src="images/hartford.png" alt="hartford">
          <em>The Hartford</em>
          <a href="https://www.thehartford.com/">ref: thehartford</a>
        </div>

      </div>
      <a class="carousel-control-prev" href="#testimonial-carousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <!--Previous and next button-->
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#testimonial-carousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <!--Previous and next button-->
        <span class="sr-only">Next</span>
      </a>
    </div>
  </section>

  <!--aside section-->
  <section class="white-section" id="cruise_places">
    <h1 class="prod_head">Find Your Perfect Cruise</h1>
    <br>
    <aside>
      <h3>cruisEASE's</h3>
      <h5>Free At Sea🌊</h5>
      <p><strong>Choose From 4 Free Offers</strong></p>
      <ol>
        <li><strong>FREE</strong> Unlimited Beverages</li>
        <li><strong>FREE</strong> Speciality Dining</li>
        <li><strong>FREE</strong> Shore Excursions</li>
        <li><strong>FREE</strong> WiFi</li>
      </ol>
      <h4>Upgrade your<br>Staycation<br>to a<br>Sailcation</h4>
      <ul>
        <li>Kids cruise <strong>FREE</strong></li>
        <li><strong>50%</strong> off Cruise Fares</li>
        <li>upto <strong>$60,300*</strong> Instant Savings</li>
      </ul>
    </aside>

    <!--cruise places and prices-->
    <img class="cruise_loc" src="images/lon-cop.webp" alt="London to Copenhagen">
    <h3 class="C-loc">London to Copenhagen</h3>
    <p class="C-loc">12 Days Aboardad Marina <br> 7 July - 19 July 2021 <br> <strong> From $3,299 Per Guest</strong> </p>
    <p class="C-loc"><a href="https://www.oceaniacruises.com/sites/default/files/cruise-search/MNA210707.jpg">ref: image1</a></p>
    <hr>
    <img class="cruise_loc" src="images/lisb.webp" alt="Lisbon to Rome">
    <h3 class="C-loc">Lisbon to Rome</h3>
    <p class="C-loc">10 Days Aboard Nautica <br> 18 July - 28 July 2021 <br> <strong>From $2249 Per Guest</strong> </p>
    <p class="C-loc"><a href="https://static.wixstatic.com/media/796d48_9ec0fd062b9d4c9c8ec7562b8ce56c94~mv2_d_2800_1867_s_2.jpg/v1/fill/w_1600,h_596,al_c,q_85/796d48_9ec0fd062b9d4c9c8ec7562b8ce56c94~mv2_d_2800_1867_s_2.webp">ref: image2</a></p>
    <hr>
    <img class="cruise_loc" src="images/sydney.webp" alt="Singapore to Sydney">
    <h3 class="C-loc">Singapore to Sydney</h3>
    <p class="C-loc">20 Days Aboard Regatta <br> 13 November - 03 December 2021 <br> <strong>From $3,849 Per Guest</strong> </p>
    <p class="C-loc"><a href="https://www.oceaniacruises.com/sites/default/files/cruise-search/REG211113.jpg">ref: image3</a></p>
    <hr>
    <img class="cruise_loc" src="images/newyork.webp" alt="New-York to Stockholm">
    <h3 class="C-loc">New-York to Stockholm</h3>
    <p class="C-loc">26 Days Aboard Insignia <br> 30 July - 25 August 2021 <br> <strong>From $8,099 Per Guest</strong> </p>
    <p class="C-loc"><a href="https://www.oceaniacruises.com/sites/default/files/cruise-search/INS210709.jpg">ref: image4</a></p>
    <hr>
  </section>

  <!--Cruise images and bootstrap cards-->
  <section class="colored-section" id="Cruising">
    <h2 class="section-heading">A Cruise for Every Need</h2>
    <p class="parahighlight">luxurious and magnificent cruises for the best price.</p>
    <!--highlighting text colour to blue-->
    <div class="row">
      <!--Bootstrap class row-->

      <div class="ship-column col-lg-4 col-md-6">
        <!--resizing column size according to the screen size of display ...... using bootstrap-->
        <div class="card">
          <!--using bootstrap cards-->
          <article class="card-header">
            <h3 class="card-text">The Mariner</h3>
            <p class="card-desc">The newly amped up Mariner of the Seas® is packed with more ways to play on the most maxed-out short getaway ever.<br>Launch yourself into a virtual world on a new bungee trampoline experience — Sky Pad®.<br>Hang ten
              on the newly added FlowRider® surf simulator or race down The Perfect Storm℠ waterslides. Bond over family-style Tuscan eats at Jamie’s Italian by Jamie Oliver, or kick off date night at The Bamboo Room. <br>Ditch the road trip for an
              action-packed cruise ship, with quick cruises sailing from London.</p>
          </article>
          <div class="card-body">
            <img class="ships" src="images/marina.jpg" alt="The Marina">
            <p><a href="https://www.royalcaribbean.com/cruise-ships/mariner-of-the-seas">ref: The Mariner</a> </p>
          </div>
        </div>
      </div>

      <div class="ship-column col-lg-4 col-md-6">
        <!--resizing column size according to the screen size of display ...... using bootstrap-->
        <div class="card">
          <!--using bootstrap cards-->
          <article class="card-header">
            <h3 class="card-text">The Nautica</h3>
            <p class="card-desc">Top-rated coasts. Bow-to-stern boasts. The best of both worlds combine for an all-in-one adventure on the Amplified Nautica of the Seas®,<br>cruising from Lisbon and Australia. Discover postcard-perfect ports in the
              Great White North and scenic tropical destinations in between unparalleled thrills onboard.<br>Like adrenaline pumping slides and rides right on deck. A new pool scene designed to level up your time in the sun.<br>And fresh, authentic
              flavors that will satisfy any craving.</p>
          </article>
          <div class="card-body">
            <img class="ships" src="images/nautica.jpg" alt="The Nautica">
            <p><a href="https://www.royalcaribbean.com/cruise-ships/freedom-of-the-seas">ref: The Nautica</a></p>
          </div>
        </div>
      </div>

      <div class="ship-column col-lg-4 col-md-6">
        <!--resizing column size according to the screen size of display ...... using bootstrap-->
        <div class="card">
          <!--using bootstrap cards-->
          <article class="card-header">
            <h3 class="card-text">The Regatta</h3>
            <p class="card-desc">Linger longer in iconic destinations onboard a ship designed for exploration.<br>Dazzling with the most glass of any <br>Royal Caribbean® ship,<br>Regatta of the Seas® is perfect for glacier gazing<br>
              in Alaska <br> and soaking up the sun in the tropics.<br>When you aren’t chasing adventure onshore,<br> unwind poolside while taking in the views,<br>stretch your muscles on the Rock Climbing Wall, <br>and sing along to show-stopping
              performances onboard.</p>
          </article>
          <div class="card-body">
            <img class="ships" src="images/regeta.jpg" alt="The Regeta">
            <p><a href="https://www.royalcaribbean.com/cruise-ships/radiance-of-the-seas">ref: The Regatta</a></p>
          </div>
        </div>
      </div>

    </div>
  </section>

  <section class="white-section">
    <!--using tables here and styling it accordingly-->
    <h1>Cancellation, Refunds and Charges</h1>
    <p></p>
    <p>Except as otherwise provided in this Contract or unless the Carrier gives the Guest written notice that other terms apply, if the Guest cancels this Contract for any reason, he or she will only be refunded the Cruise Fare or a portion thereof
      paid depending upon the specific itinerary and when the Contract was canceled.
      Cancellations and requests for refund must be communicated to the Carrier by calling 1-800-XXX-XXX during operational hours. All documents (deposit receipt or passage tickets) issued by Carrier must be returned before any refund can be
      processed.
    </p>
    <p></p>
    <table>
      <tr>
        <th>Days To Departure</th>
        <th>Cancellation Charges</th>
      </tr>
      <tr>
        <td>90 days or more prior to departure:</td>
        <td>15% of cruise fare</td>
      </tr>
      <tr>
        <td>89-57 days prior to departure:</td>
        <td>25% of cruise fare</td>
      </tr>
      <tr>
        <td>56-30 days prior to departure:</td>
        <td>50% of cruise fare</td>
      </tr>
      <tr>
        <td>29-15 days prior to departure:</td>
        <td>75% of cruise fare</td>
      </tr>
      <tr>
        <td>14 days prior to day of departure:</td>
        <td>100% of cruise fare</td>
      </tr>
    </table>
  </section>

  <footer class="colored-section" id="footer">
    <?php include('./includes/footer.inc') ?>
  </footer>

</body>

</html>
