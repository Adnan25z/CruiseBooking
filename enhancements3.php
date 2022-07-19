<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <?php include('./includes/header.inc'); ?>
</head>

<body>
  <section class="colored-section" id="title">
    <!-- Nav Bar -->
    <header>
    <?php include('./includes/nav.inc') ?>
    </header>
  </section>

  <section class="white-section">
    <div class="container">
      <h2>Average Orders Per Day</h2>
      <p>One of the enhancements I have created in my assignment is displaying <a href="manager.php"></a> the average number of orders per day on the manager page. I created a query which calculates the average of the number of orders in a day and then echoes it within the php function.</p>
      <p><strong>Preview:</strong></p>
      <img class="col-md-6 enhance-img" src="images/avg.png" alt="Average orders" title="Average Orders">
    </div>
    <br>
    <hr>
    <br>
    <div class="container">
      <h2>Page Last Visited</h2>
      <p>Page cookie <a href="manager.php">click here to view it</a> to show the last time you visited the page.
        might need to refresh it to make it work.</p>
      <p><strong>Preview:</strong></p>
      <img class="col-md-6 enhance-img" src="images/lastvisit.png" alt="last visit Preview" title="last visit preview">
    </div>
    <br>
    <hr>
    <br>
    <div class="container">
      <h2>Most Popular Product</h2>
      <p> See which product the user has brought the most number of times.<a href="manager.php">click here to view it</a>.</p>
      <p><strong>Preview:</strong></p>
      <img class="col-md-6 enhance-img" src="images/pop.png" alt="Most Popular" title="Most Popular Product">
    </div>
    <br>
    <hr>
    <br>
  </section>

  <footer class="colored-section">
    <?php include('./includes/footer.inc') ?>
	</footer>

</body>