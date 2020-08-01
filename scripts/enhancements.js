/*
* Author: Gia Hy Nguyen 
* Target: enquire.html, index.html
* Purpose: Implement enhancements for assignment 2
* Created: 02/05/2020
* Last updated: 03/05/2020
*/

"use strict";
var debug = true;
/*****************************
****Start of enhancement 1****
******************************/
window.onload = init;

function init(){							//This function gets triggered whenver the current page is loaded
	var toTopButton = document.getElementById("scrollToTopButton");
	toTopButton.onclick = goToTop;
}

/**
 * When the user scrolls down, show the button
 */
window.onscroll = controlScroll;
function controlScroll(){
	var html = document.documentElement;
	if (html.scrollTop > 100)
		document.getElementById("scrollToTopButton").classList.add("show");
	else
		document.getElementById("scrollToTopButton").classList.remove("show");
}

/**
 * When the user clicks on the button, scroll to the top of the document
 */
function goToTop(){
	document.documentElement.scrollTop = 0;
}


/*****************************
****Start of enhancement 2****
******************************/
/**
 * These two function show and hide the pop up
 */
function show() {
  document.getElementById('myModal').style.display = "block";
}
function hide() {
  document.getElementById('myModal').style.display = "none";
}

// Set waiting time to be 10 seconds
var setTime = new Date()
setTime.setSeconds(setTime.getSeconds() + 10);

/**
 *  Set time interval to check if 10 seconds have passed, if so display the modal
 */
var timeCount = setInterval(function () {

  var now = new Date().getTime();   //current time
  var waitTime = setTime - now;		//difference between current time and target

  // when the wait is over 
  if (waitTime < 0) {
    clearInterval(timeCount);		//stop repeating the function
    
    show();							//display the pop up

  	var modal = document.getElementById('myModal');
  	var closeBtn = document.getElementsByClassName("close")[0];

  	closeBtn.onclick = function () {		//hide the pop up if close button was clicked
    	hide();
  	}

  	window.onclick = function (event) {
    	if (event.target == modal) {		//hide the pop up when the user clicks anywhere outside of it
    		hide();
    	}
  	}
  }
}, 1000);
