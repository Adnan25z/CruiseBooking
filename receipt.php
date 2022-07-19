<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('./includes/header.inc'); ?>
  <script src="scripts/part2.js"></script>
  <script src="scripts/enhancement.js"></script>
</head>

<body>
   <!-- Navigation -->
   <section class="colored-section">
     <header id="nav-bar">
      <?php include('./includes/nav.inc') ?>
     </header>
   </section>

   <section id="contact">
    <div class="container">
	    <br>
		<h2>Receipt</h2>
		<p class="text-center">Your order has been inserted into the database.</p>
		<?php			
			if (!isset($_GET["db_msg"])) {// not from process_order.php, redirection
				header("location:enquire.php");
				exit();
			}
			else { // from process_order.php, display receipt
				echo $_GET["db_msg"];
			}
		?>
	</section>
	<br>
	<br>
   <!-- Footer -->
   <footer class="colored-section" id="footer">
    <?php include('./includes/footer.inc') ?>
  </footer>
</body>
</html>