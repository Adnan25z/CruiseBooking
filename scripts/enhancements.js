/**
* Author: Adnan Zafar
* Target: payment.html
* Purpose: Apply enhancements to payment.html
*/

"use strict";
	/******** Countdown Timer ********/
function countdown() {
	var time = 600;		//Time in seconds for countdown
	setInterval(function () {
		var minutes = Math.floor(time / 60);		//Calculate minutes
		var seconds = time % 60;					//Calculate seconds
		document.getElementById("timer").textContent = "You have " + minutes + ":" + seconds + " left to complete your purchase.";
		time--;
		if (time < 0) {		//If time is up
			clearStorage()	//Then run clearStorage function
		}
	}, 1000);				//Function updates every second
}
	/******** Full Name Prefilled ********/
function enhancements() {
	//Full Name Field
	//document.getElementById("full-name").value = localStorage.getItem("fnaam") + " " + localStorage.getItem("lnaam");

	//Name on card prefill
	document.getElementById("cardholder").value = localStorage.getItem("fnaam") + " " + localStorage.getItem("lnaam");

	//Additional Comments - Textarea hidden if no comment
	document.getElementById("subject").value = localStorage.getItem("subject");	 //Get comment from storage and display
	if (document.getElementById("subject").value == ""){						 //If there is no comment in the textarea
	document.getElementById("additional-comments").style.display = "none";	 //Then hide the div
	}
}

function enhancement_init() {
 if (document.getElementById("payment_form") != null) { // it is payment page
  	countdown();
		enhancements();
  }
}
window.addEventListener("load",enhancement_init);
