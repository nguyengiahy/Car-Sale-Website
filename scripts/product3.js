"use strict"

function move(){			//if the button is clicked, then redirect to enquire.html
	window.location = "enquire.php";
}


function init(){			//initialisation
	var btn = document.getElementsByClassName("buyBtn");
	for (var i = 0; i < btn.length; i++){
		btn[i].onclick = move;			//action happened when buy buttons are clicked
	}
}

window.onload = init;