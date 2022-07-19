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
      <h2>Countdown Timer on Payment Page</h2>
      <p>One of the enhancements I have created in my assignment is a <a href="payment.php#timer">countdown timer</a> on the payment page. I created a function which updates every second and calculates the time left, then edits the paragraph to
        display the updated remaining time. If the time is up then it runs the clearStorage function, which clears local storage and redirects the visitor back to index.html. I used this YouTube video: <a
          href="https://www.youtube.com/watch?v=x7WJEmxNlEs">https://www.youtube.com/watch?v=x7WJEmxNlEs</a> to learn how to do it and modified the code to suit.</p>
      <p><strong>Preview:</strong></p>
      <img class="col-md-6 enhance-img" src="images/ezgif.com-gif-maker.gif" alt="Countdown Timer Preview" title="Countdown Timer Preview">
    </div>
    <hr>
    <div class="container">
      <h2>Name on Card is Prefilled</h2>
      <p>Another enhancement is that I have made the name on the card to be prefilled based on the first name and last name entered, <a href="payment.php#cardholder">click here to view it</a>. I have also added the same functionality to the name
        field that is displayed on the payment page, so rather than showing separate fields for First Name and Last name, it just shows one field for the full name, <a href="payment.php#full-name">click here to view it</a>.</p>
      <p><strong>Preview:</strong></p>
      <img class="col-md-6 enhance-img" src="images/prefillname.png" alt="Pre-fill name Preview" title="Pre-fill name Preview">
    </div>
    <hr>
    <div class="container">
      <h2>Comments Textbox Hidden if Empty</h2>
      <p>I have also added functionality for the additional comments textbox to hidden from the payment page if the visitor hasn't entered anything into it from the enquire page. This makes the design cleaner and less congested and also doesn't show
        the user information that they don't need, improving the UX.</p>
      <p><strong>Preview:</strong></p>
      <img class="col-md-6 enhance-img" src="images/emptycomment.gif" alt="Empty Comment Preview" title="Empty Comment Preview">
    </div>
    <hr>
  </section>

  <footer class="colored-section">
    <?php include('./includes/footer.inc')?>
	</footer>

</body>
