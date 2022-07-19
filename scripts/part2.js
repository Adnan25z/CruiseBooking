/**
 * Author: Adnan Zafar
 * Target: enquire.html, payment.html
 * Purpose: Validate HTML form submission and pass info from enquire.html to payment.html
 */

"use strict";
var debug = true;

/*************** Enquiry Form Validation ***************/
function validateEnquire() {
  var errMsg = "";
  var result = true;

  var fnaam = document.getElementById("fnaam").value.trim();
  var lnaam = document.getElementById("lnaam").value.trim();
  var email = document.getElementById("email").value.trim();
  var street = document.getElementById("street").value.trim();
  var town = document.getElementById("town").value.trim();

  //State Dropdown
  var state = document.getElementById("state");
  var stateTxt = state.options[state.selectedIndex].text;

  var postcode = document.getElementById("postcode").value.trim();
  var phone = document.getElementById("phone").value.trim();

  var radPost = document.getElementById("post").checked;
  localStorage.setItem("post", radPost)
  var radEmail = document.getElementById("Email").checked;
  localStorage.setItem("Email", radEmail)
  var radPhone = document.getElementById("Phone").checked;
  localStorage.setItem("Phone", radPhone)

  //Preferred Contact
  var radPost = document.getElementById("post").checked;
  var radEmail = document.getElementById("Email").checked;
  var radPhone = document.getElementById("Phone").checked;

  //Product Features
  var chkCabin = document.getElementById("Cabin/Suite").checked;
  var chkProv = document.getElementById("Provisioning").checked;
  var chkHighlights = document.getElementById("Cruise_Highlights").checked;

  //Cruise and Pricing Dropdown
  var book = document.getElementById("book");
  var bookTxt = book.options[book.selectedIndex].text;

  //Number of days to book for
  var days = document.getElementById("days").value.trim()

  var subject = document.getElementById("subject").value.trim();

  /************ Validation *************/
  if (!debug) {
    if (fnaam == "") {
      errMsg += "Please enter your first name.\n";
    }

    if (lnaam == "") {
      errMsg += "Please enter your last name.\n";
    }

    if (email == "") {
      errMsg += "Please enter your email.\n";
    }

    if (street == "") {
      errMsg += "Please enter your street address.\n";
    }

    if (town == "") {
      errMsg += "Please enter your town/suburb.\n";
    }

    if (postcode == "") {
      errMsg += "Please enter your postcode.\n";
    }

    //State/Postcode Validation
    if (stateTxt == "---Please Select---") {
      errMsg += "Please select one of the states.\n";
    } else if (stateTxt == "VIC" && !postcode.match(/^3|^8/)) {
      errMsg += "A postcode for Victoria must start with 3 or 8.\n";
    } else if (stateTxt == "NSW" && !postcode.match(/^1|^2/)) {
      errMsg += "A postcode for NSW must start with 1 or 2.\n";
    } else if (stateTxt == "QLD" && !postcode.match(/^4|^9/)) {
      errMsg += "A postcode for QLD must start with 4 or 9.\n";
    } else if (stateTxt == "NT" && !postcode.match(/^0/)) {
      errMsg += "A postcode for Northern Territory must start with 0.\n";
    } else if (stateTxt == "WA" && !postcode.match(/^6/)) {
      errMsg += "A postcode for Western Australia must start with 6.\n";
    } else if (stateTxt == "SA" && !postcode.match(/^5/)) {
      errMsg += "A postcode for South Australia must start with 5.\n";
    } else if (stateTxt == "TAS" && !postcode.match(/^7/)) {
      errMsg += "A postcode for Tasmania must start with 7.\n";
    } else if (stateTxt == "ACT" && !postcode.match(/^0/)) {
      errMsg += "A postcode for ACT must start with 0.\n";
    }

    if (phone == "") {
      errMsg += "Please enter your phone number.\n";
    }

    //days Validation
    if (days == "") {
      errMsg += "Please enter the number of days you wish to book for.\n";
    } else if (days < 10) {
      errMsg = errMsg + "The number of days must be higher than 10.\n"
    } else if (days > 40) {
      errMsg = errMsg + "The number of days must be less than 40.\n"
    }

    //booking and price
    if (bookTxt == "-- Select --") {
      errMsg += "Please select a cruise plan.\n";
    }
  }

  if (errMsg != "") { // There are errors
    alert(errMsg); //Displays error
    result = false;
  } else { // no error, save info to storage
    saveInfo(fnaam, lnaam, email, street, town, stateTxt, postcode, phone, radPost, radEmail, radPhone, chkCabin, chkProv, chkHighlights, bookTxt, days, subject);
  }
  return result;
}

/*************** Save Info ***************/
function saveInfo(fnaam, lnaam, email, street, town, stateTxt, postcode, phone, radPost, radEmail, radPhone, chkCabin, chkProv, chkHighlights, bookTxt, days, subject) {
  localStorage.setItem("fnaam", fnaam);
  localStorage.setItem("lnaam", lnaam);
  localStorage.setItem("email", email);
  localStorage.setItem("street", street);
  localStorage.setItem("town", town);
  localStorage.setItem("stateTxt", stateTxt);
  localStorage.setItem("postcode", postcode);
  localStorage.setItem("phone", phone);
  localStorage.setItem("radPost", radPost);
  localStorage.setItem("radEmail", radEmail);
  localStorage.setItem("radPhone", radPhone);
  localStorage.setItem("chkCabin", chkCabin);
  localStorage.setItem("chkProv", chkProv);
  localStorage.setItem("chkHighlights", chkHighlights);
  localStorage.setItem("bookTxt", bookTxt);
  localStorage.setItem("days", days);
  localStorage.setItem("subject", subject);
}

/******** Get Info From Storage & Display It ********/
function getInfo() {
  if (typeof(Storage) !== "undefined") { // the browser supports web storage
    if (localStorage.getItem("fnaam") !== null) {
      document.getElementById("first-name").value = localStorage.getItem("fnaam");
      document.getElementById("last-name").value = localStorage.getItem("lnaam");
      document.getElementById("email").value = localStorage.getItem("email");

      //Full Address
      document.getElementById("full-address").innerHTML = localStorage.getItem("street") + ", " + localStorage.getItem("town") + ", " + localStorage.getItem("stateTxt") + " " + localStorage.getItem("postcode");
      document.getElementById("street_address").value = localStorage.getItem("street");
      document.getElementById("suburb").value = localStorage.getItem("town");
      document.getElementById("state").value = localStorage.getItem("stateTxt");
      document.getElementById("postcode").value = localStorage.getItem("postcode");

      document.getElementById("phone").value = localStorage.getItem("phone");
      document.getElementById("books").value = localStorage.getItem("bookTxt");
      document.getElementById("days").value = localStorage.getItem("days");

      // Calculate total cost
      var cost = 0; //create variable cost
      var days = Number(localStorage.getItem("days")); //create variable months and get value from storage
      if (localStorage.getItem("bookTxt") == "Lisbon to Rome: $224.90 / day") { //If this plan is chosen
        cost = 224.90 * days; //Then the cost is $224.90 * the number of days
      } else if (localStorage.getItem("bookTxt") == "London to Copenhagen: $274.92 / day") { //If this plan is chosen
        cost = 274.92 * days; //Then the cost is $274.92 * the number of dayss
      } else if (localStorage.getItem("bookTxt") == "Singapore to Sydney: $192.45 / day") { //If this plan is chosen
        cost = 192.45 * days; //Then the cost is $192.45 * the number of days
      } else if (localStorage.getItem("bookTxt") == "Newyork to Stockholm: $311.50 / day") { //If this plan is chosen
        cost = 311.50 * days; //Then the cost is $311.50 * the number of days
      }
      document.getElementById("totalCost").value = "$" + cost.toFixed(2); //Display Cost

      //Preferred Contact Radio Buttons
      var radPost = localStorage.getItem("radPost");
      document.getElementById("radpost").checked = (radPost == "true");
      var radEmail = localStorage.getItem("radEmail");
      document.getElementById("rademail").checked = (radEmail == "true");
      var radPhone = localStorage.getItem("radPhone");
      document.getElementById("radphone").checked = (radPhone == "true");

      //Product Features Checkboxes
      var chkCabin = localStorage.getItem("chkCabin");
      document.getElementById("personalised").checked = (chkCabin == "true");

      var chkProv = localStorage.getItem("chkProv");
      document.getElementById("Provisioning").checked = (chkProv == "true");

      var chkHighlights = localStorage.getItem("chkHighlights");
      document.getElementById("Highlights").checked = (chkHighlights == "true");
    }
  }
}

/******** Payment Form Validation ********/
function validatePayment() {
  var errMsg = "";
  var result = true;

  //Card Type Dropdown
  var card = document.getElementById("card");
  var cardtxt = card.options[card.selectedIndex].text;

  var cardholder = document.getElementById("cardholder").value.trim();
  var cardNumber = document.getElementById("cardNumber").value.trim();
  var expirym = document.getElementById("expirym").value.trim();
  var expiryy = document.getElementById("expiryy").value.trim();
  var cvv = document.getElementById("cvv").value.trim();

  if (!debug) {
    if (cardtxt == "---Please Select---") {
      errMsg += "Please select your credit card type. \n";
    }

    //Card Holder Validation
    if (cardholder == "") {
      errMsg += "Please enter the name on the credit card.\n";
    } else if (cardholder.length > 40) {
      errMsg += "Card name must be less than 40 characters in length.\n";
    } else if (!cardholder.match(/^[a-zA-Z ]*$/)) {
      errMsg += "Card name must be alphabetical and spaces only.\n";
    }

    //Card Number/Type Validation
    if (cardtxt == "Visa" && !cardNumber.match(/^4[0-9]{15}$/)) {
      errMsg += "A Visa card number must start with 4 and have 16 digits. \n";
    } else if (cardtxt == "Mastercard" && !cardNumber.match(/^5[1-5][0-9]{14}$/)) {
      errMsg += "A Mastercard card number must start with 51 through to 55 and have 16 digits. \n";
    } else if (cardtxt == "American Express" && !cardNumber.match(/^3[47][0-9]{13}$/)) {
      errMsg += "An American Express card number must start with 34 or 37 and have 15 digits. \n";
    }

    if (expirym == "") {
      errMsg += "Please enter the credit card expiry month. \n";
    } else if (expirym.length > 2) {
      errMsg += "Credit card expiry month must be in the format MM. \n";
    } else if (expirym > 12) {
      errMsg += "There are only 12 months in a year. Not " + expiryM + "! \n";
    }
    if (expiryy == "") {
      errMsg += "Please enter the credit card expiry year. \n";
    } else if (expiryy.length > 2) {
      errMsg += "Credit card expiry year must be in the format YY. \n";
    }

    if (cvv == "") {
      errMsg += "Please enter the credit card cvv number. \n";
    }
  }

  if (errMsg != "") {
    alert(errMsg);
    result = false;
  }

  return result;
}

function clearStorage() { //For cancel button
  localStorage.clear();
  location.href = "index.php";
}



//*************** Initialise ***************
function init() {
  if (document.getElementById("enquiry_form") != null) { // it is enquire page
    document.getElementById("enquiry_form").onsubmit = validateEnquire;
  } else if (document.getElementById("payment_form") != null) { // it is payment page
    getInfo(); // fill up the page with information passed from enquire page
    document.getElementById("payment_form").onsubmit = validatePayment;
    document.getElementById("btns1").onclick = clearStorage;
  }
}
window.addEventListener("load", init);
