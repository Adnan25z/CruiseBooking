<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <?php include('./includes/header.inc');
  $page = "home"; ?>
</head>

<body>
  <section class="colored-section" id="title">
    <!-- Nav Bar -->
    <header>
      <?php include('./includes/nav.inc') ?>
    </header>
  </section>

  <!-- Title -->
  <section class="bg-image" id="title_img">
    <h1 class="big-heading">Cruise with Ease.</h1>
    <h3 class="sub-heading">Plan a cruise with <br> booking flexibility </h3>
    <br>
    <a href="product.php" class="btn btn-lg btn-dark btn-info" role="button">Know More</a>      <!--Using bootstrap button class and styling the button-->
  </section>

  <section class="white-section" id="intro">
    <h2 class="section-heading">The cruisEASE Experience</h2>
    <p>Each of our voyages is an invitation to discover your next travel story and reignite your passions. Experience faraway places that you have always dreamed of.<br> Encounter new ways of looking at the world and travel to the far corners of
      the globe.<br> Savor your experience with imaginative insider tours that immerse you in the heart of the destination’s culinary and cultural traditions.</p>
    <p>Thousands of reasons – one passion. There are as many reasons to travel as there are travelers in this world. It’s your turn to embrace your passion for travel with cruisEASE Cruises.</p>
    <p><a href="https://www.oceaniacruises.com/?s=PS_NEO_BRA_NA_GOO_NA_SRH_NA_NA_NA_AS_NA&gclsrc=aw.ds&&gclid=Cj0KCQjwjPaCBhDkARIsAISZN7QxfGvVLlv4mMFOGq4LfdQy0Vx2pmLBRE_zf8NumlSOeDxzobBjcYgaAm2wEALw_wcB">Text Citation</a></p>

    <div class="row">                                             <!--Bootstrap row class to divide the page into rows -->
      <div class="feature-box col-lg-4">                          <!--Bootstrap column class to divid the page vertically into 3 parts-->
        <i class="icons fas fa-check-circle fa-4x"></i>           <!-- Using font awesome icons -->
        <h3 class="feature-text">Easy to use.</h3>
        <p>Book your cruise with ease using our user-friendly interface.</p>
      </div>

      <div class="feature-box col-lg-4">                          <!--Bootstrap column class to divid the page vertically into 3 parts-->
        <i class="icons fas fa-bullseye fa-4x"></i>               <!-- Using font awesome icons -->
        <h3 class="feature-text">Elite Clientele</h3>
        <p>We get the best group together, the greatest people at one place !.</p>
      </div>

      <div class="feature-box col-lg-4">                          <!--Bootstrap column class to divid the page vertically into 3 parts-->
        <i class="icons fas fa-heart fa-4x"></i>                  <!-- Using font awesome icons -->
        <h3 class="feature-text">Guaranteed to work.</h3>
        <p>Live your most carefree life and have a stress free getaway.</p>
      </div>
    </div>

  </section>

  <footer class="colored-section" id="footer">
    <?php include('./includes/footer.inc') ?>
  </footer>

</body>

</html>
