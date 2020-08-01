/*
* Author: Gia Hy Nguyen 
* Target: enquire.html
* Purpose: Validate the form in enquiry page and store form data in client-side storage
* Created: 02/05/2020
* Last updated: 03/05/2020
*/
"use strict";
var debug = true;
//This function is to validate the form inputs
function validateEnquire(){								 //return true when all the inputs are passed so that the form can be submitted
	//local variables declaration
	var result = true;
	var errMsg = "";

	var state = document.getElementById("state").value;
	var postCode = document.getElementById("post_code").value.trim();
	var isMerc = document.getElementById("mercCheckbox").checked;
	var isAudi = document.getElementById("audiCheckbox").checked;
	var isBMW = document.getElementById("bmwCheckbox").checked;
	var isTesla = document.getElementById("teslaCheckbox").checked;
	var mercQuantity = document.getElementById("mercQuantity").value;
	var audiQuantity = document.getElementById("audiQuantity").value;
	var bmwQuantity = document.getElementById("bmwQuantity").value;
	var teslaQuantity = document.getElementById("teslaQuantity").value;
	var firstname = document.getElementById("first_name").value.trim();
	var lastname = document.getElementById("last_name").value.trim();
	var email = document.getElementById("email").value;
	var address = document.getElementById("address").value.trim();
	var suburb = document.getElementById("suburb").value.trim();
	var phone = document.getElementById("phone").value.trim();
	var enquire = document.getElementById("enquire_about").value;
	var comment = document.getElementById("cmt_text").value.trim();

	if (!debug){		//disable Javascript validation
		//State validation
		if (state == "none"){								//if state has not been selected
			errMsg += "You must select your state.\n";
			result = false;
		}
		//Post code validation
		if (postCode == ""){									//post code must be entered
			errMsg += "Post code cannot be left blank.\n";
			result = false;
		}
		else if (!postCode.match(/^\d{4}$/)){					//Use regular expression to check the format of postcode
			errMsg += "Your postcode must be a 4-digit number.\n";
			result = false;
		}
		else{													//validate postcode accordingly to selected state
			switch (state){
				case "VIC":
					if (postCode[0] != "3" && postCode[0] != "8"){					//VIC post code must start with 3 or 8
						errMsg += "VIC post code must start with 3 or 8.\n";
						result = false;
					}
					break;
				case "NSW":
					if (postCode[0] != "1" && postCode[0] != "2"){					//NSW post code must start with 1 or 2
						errMsg += "NSW post code must start with 1 or 2.\n";
						result = false;
					}
					break;
				case "QLD":
					if (postCode[0] != "4" && postCode[0] != "9"){					//QLD post code must start with 4 or 9
						errMsg += "QLD post code must start with 4 or 9.\n";
						result = false;
					}
					break;
				case "WA":
					if (postCode[0] != "6"){										//NA post code must start with 6
						errMsg += "WA post code must start with 6.\n";
						result = false;
					}
					break;
				case "SA":
					if (postCode[0] != "5"){										//SA post code must start with 5
						errMsg += "SA post code must start with 5.\n";
						result = false;
					}
					break;
				case "TAS":
					if (postCode[0] != "7"){										//TAS post code must start with 7
						errMsg += "TAS post code must start with 7.\n";
						result = false;
					}
					break;
				case "NT":
				case "ACT":
					if (postCode[0] != "0"){										//NT and ACT post code must start with 0
						errMsg += `${state} post code must start with 0.\n`;
						result = false;
					}
					break;
			}
		}

		//Quantity check
		if (isNaN(mercQuantity) || isNaN(audiQuantity) || isNaN(bmwQuantity) || isNaN(teslaQuantity)){  //Quantity must be a number
			errMsg += "Quantity must be a number.\n";
			result = false;
		} 		
		else if (mercQuantity < 0 || audiQuantity < 0 || bmwQuantity < 0 || teslaQuantity < 0){		//Negative quantities are not allowed
			errMsg += "Quantity must be a positive number.\n";
			result = false;
		}
		else if (!checkInt(mercQuantity) || !checkInt(audiQuantity) || !checkInt(bmwQuantity) || !checkInt(teslaQuantity)){   //Quantity is not an integer
			errMsg += "Quantity must be an integer.\n";
			result = false;
		}

		//Product chosen validation
		if (!(isMerc || isAudi || isBMW || isTesla)){											//At least 1 product must be chosen to proceed 
			errMsg += "You have not chosen any product. Please select at least one.\n";
			result = false;
		}
		else if ((isMerc && mercQuantity == 0) || (isAudi && audiQuantity == 0) || 				//Quantities for selected products must be entered
				 (isBMW && bmwQuantity == 0) || (isTesla && teslaQuantity == 0)){
			errMsg += "Please enter quantity for all of your selected products.\n";
			result = false;
		}
	}

	if (result){																			//If no errors, store all the information into client local storage
		storeData(firstname, lastname, email, address, suburb, state, postCode, phone, getPreferredContact(), enquire, comment, 
			      isMerc, isAudi, isBMW, isTesla, mercQuantity, audiQuantity, bmwQuantity, teslaQuantity);
	}

	if (errMsg != "")																		//Display error message if there is any error
		alert(errMsg);

	return result;
}

//Get preferred contact method
function getPreferredContact(){
	var contactMethod = "Unknown";
	var methods = document.getElementById("contactMethod").getElementsByTagName("input");

	for (var i = 0; i < methods.length; i++){				//Get all the checkbox inputs
		if (methods[i].checked)								//If the input is checked
			contactMethod = methods[i].value;				//Store the preferred contact method
	}

	return contactMethod;
}

//Check if input is an integer
function checkInt(text){
	if (text != 0)
		if (parseInt(text, 10) !== Number(text))
			return false;
	return true;
}

function storeData(firstname, lastname, email, address, suburb, state, postCode, phone, contact, enquire, comment, 
	               isMerc, isAudi, isBMW, isTesla, mercQuantity, audiQuantity, bmwQuantity, teslaQuantity){

	if(typeof(Storage)!=="undefined"){  // if the browser support web storage

		//Personal information
		localStorage.setItem("firstName", firstname);
		localStorage.setItem("lastName", lastname);
		localStorage.setItem("email", email);
		localStorage.setItem("address", address);
		localStorage.setItem("suburb", suburb);
		localStorage.setItem("state", state);
		localStorage.setItem("postCode", postCode);
		localStorage.setItem("phone", phone);
		localStorage.setItem("contact", contact);
		localStorage.setItem("enquire", enquire);
		localStorage.setItem("comment", comment);
		//Product features checkbox
		var ft1=document.getElementById("ft1").checked;
		localStorage.setItem("feature1", ft1);
		var ft2=document.getElementById("ft2").checked;
		localStorage.setItem("feature2", ft2);
		var ft3=document.getElementById("ft3").checked;
		localStorage.setItem("feature3", ft3);

		//Purchases information
		localStorage.setItem("mercCheckbox", isMerc);
		localStorage.setItem("audiCheckbox", isAudi);
		localStorage.setItem("bmwCheckbox", isBMW);
		localStorage.setItem("teslaCheckbox", isTesla);
		if (isMerc)
			storeCarProperties("merc");
		if (isAudi)
			storeCarProperties("audi");
		if (isBMW)
			storeCarProperties("bmw");
		if (isTesla)
			storeCarProperties("tesla");

		//Store quantity
		localStorage.setItem("mercQuantity", mercQuantity);
		localStorage.setItem("audiQuantity", audiQuantity);
		localStorage.setItem("bmwQuantity", bmwQuantity);
		localStorage.setItem("teslaQuantity", teslaQuantity);
	}
}

function storeCarProperties(brand){			//if this car brand is selected, then properties of this brand will be stored
	var quantityID = brand + "Quantity";
	var colorID = brand + "Color";
	var modelID = brand + "Model";
	var priceID = brand + "Price";
	localStorage.setItem(quantityID, document.getElementById(quantityID).value);
	localStorage.setItem(colorID, document.getElementById(colorID).value);
	localStorage.setItem(modelID, document.getElementById(modelID).value);
	localStorage.setItem(priceID, document.getElementById(priceID).value);
}

function init(){							//This function gets triggered whenver the current page is loaded
	var form = document.getElementById("enquireForm");
	form.onsubmit = validateEnquire;
}

window.onload = init;