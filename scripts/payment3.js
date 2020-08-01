/*
* Author: Gia Hy Nguyen 
* Target: payment.html
* Purpose: Validate the payment details and fill up the pre-entered data, then send the data to server
* Created: 02/05/2020
* Last updated: 03/05/2020
*/

"use strict"
var debug = true;

function getInfo(){
	if (typeof(Storage)!=="undefined"){									// the browser support web storage
		if (localStorage.getItem("firstName") !== null){				// there are some saved info in storage 

			//Personal details section
			document.getElementById("fullName").textContent = localStorage.getItem("firstName") + " " + localStorage.getItem("lastName");
			document.getElementById("email").textContent = localStorage.getItem("email");
			document.getElementById("address").textContent = localStorage.getItem("address");
			document.getElementById("suburb").textContent = localStorage.getItem("suburb");
			document.getElementById("state").textContent = localStorage.getItem("state");
			document.getElementById("postCode").textContent = localStorage.getItem("postCode");
			document.getElementById("phone").textContent = localStorage.getItem("phone");
			document.getElementById("contact").textContent = localStorage.getItem("contact");

			//Enquiries section
			document.getElementById("enquire").textContent = localStorage.getItem("enquire");
			var ft = "";
			if (localStorage.getItem("feature1") == "true")   //if feature 1 was chosen
				ft = "feature 1";
			if (localStorage.getItem("feature2") == "true"){   //if feature 2 was chosen
				if (ft != "")
					ft += ",";
				ft += "feature 2";
			}
			if (localStorage.getItem("feature3") == "true"){   //if feature 3 was chosen
				if (ft != "")
					ft += ",";
				ft += "feature 3";
			}
			document.getElementById("feature").textContent = ft;
			document.getElementById("comment").textContent = localStorage.getItem("comment");

			//Purchase section
			var displayResult = "";		//data to be displayed on payment
			var sendResult = "";		//date to be sent to server
			var sum = 0;				//total cost
			if (localStorage.getItem("mercCheckbox") == "true"){			//Mercedes chosen
				displayResult += displayProduct("merc");
				sendResult += sendDataProduct("merc");
				sum += costCalc("merc");
			}
			if (localStorage.getItem("audiCheckbox") == "true"){				//Audi chosen
				displayResult += displayProduct("audi");
				sendResult += sendDataProduct("audi");
				sum += costCalc("audi");
			}
			if (localStorage.getItem("bmwCheckbox") == "true"){				//BMW chosen
				displayResult += displayProduct("bmw");
				sendResult += sendDataProduct("bmw");
				sum += costCalc("bmw");
			}
			if (localStorage.getItem("teslaCheckbox") == "true"){			//Tesla chosen
				displayResult += displayProduct("tesla");
				sendResult += sendDataProduct("tesla");
				sum += costCalc("tesla");
			}
			document.getElementById("purchases").innerHTML = displayResult;
			document.getElementById("cost").textContent = sum + "$";


			//Hidden inputs filled up
			document.getElementById("firstNameSend").value = localStorage.getItem("firstName");	 
			document.getElementById("lastNameSend").value = localStorage.getItem("lastName");
			document.getElementById("emailSend").value = localStorage.getItem("email");
			document.getElementById("addressSend").value = localStorage.getItem("address");
			document.getElementById("suburbSend").value = localStorage.getItem("suburb");
			document.getElementById("stateSend").value = localStorage.getItem("state");
			document.getElementById("postCodeSend").value = localStorage.getItem("postCode");
			document.getElementById("phoneSend").value = localStorage.getItem("phone");
			document.getElementById("contactSend").value = localStorage.getItem("contact");
			document.getElementById("enquireSend").value = localStorage.getItem("enquire");
			document.getElementById("featuresSend").value = ft;
			document.getElementById("commentSend").value = localStorage.getItem("comment");
			document.getElementById("purchasesSend").value = sendResult;
			document.getElementById("costSend").value = sum + "$";

			document.getElementById("isMercSend").value = localStorage.getItem("mercCheckbox");
			document.getElementById("isAudiSend").value = localStorage.getItem("audiCheckbox");
			document.getElementById("isBMWSend").value = localStorage.getItem("bmwCheckbox");
			document.getElementById("isTeslaSend").value = localStorage.getItem("teslaCheckbox");

			document.getElementById("mercQuantitySend").value = localStorage.getItem("mercQuantity");
			document.getElementById("audiQuantitySend").value = localStorage.getItem("audiQuantity");
			document.getElementById("bmwQuantitySend").value = localStorage.getItem("bmwQuantity");
			document.getElementById("teslaQuantitySend").value = localStorage.getItem("teslaQuantity");

			document.getElementById("mercColorSend").value = localStorage.getItem("mercColor");
			document.getElementById("audiColorSend").value = localStorage.getItem("audiColor");
			document.getElementById("bmwColorSend").value = localStorage.getItem("bmwColor");
			document.getElementById("teslaColorSend").value = localStorage.getItem("teslaColor");

			document.getElementById("mercModelSend").value = localStorage.getItem("mercModel");
			document.getElementById("audiModelSend").value = localStorage.getItem("audiModel");
			document.getElementById("bmwModelSend").value = localStorage.getItem("bmwModel");
			document.getElementById("teslaModelSend").value = localStorage.getItem("teslaModel");
		}
	}
}

//Display chosen products data
function displayProduct(brand){
	var name = "";					//product's name
	var quantity = "";				//product's quantity
	var color = "";					//product's color
	var model = "";					//product's model
	var price = "";					//product's price

	switch (brand){								//Get product's name
		case "merc":
			name = "Mercedes Benz E-class";
			break;
		case "audi":
			name = "Audi RS Serial Models";
			break;
		case "bmw":
			name = "BMW i-series";
			break;
		case "tesla":
			name = "Tesla Roadster";
			break;
	}

	var quantityKey = brand + "Quantity";		//quantity key to look for in local storage
	var colorKey = brand + "Color";				//color key to look for in local storage
	var modelKey = brand + "Model";				//model key to look for in local storage
	var priceKey = brand + "Price";				//price key to look for in local storage

	quantity = localStorage.getItem(quantityKey);	//get product's quantity
	color = localStorage.getItem(colorKey);			//get product's color
	model = localStorage.getItem(modelKey);			//get product's model
	price = localStorage.getItem(priceKey);			//get product's price

	//Display the product's information
	var result = 	`
					<div>                                                                    
                        <p>
                            <label>${name}</label>
                        </p>                                               
                        <ul class="extraOptions">                                           
                            <li>
                                <label for="${brand}Quantity">Quantity: </label>                
                                <input type="text" name="${brand}Quantity" id="${brand}Quantity" value="${quantity}" readonly>
                            </li>
                            <li>                                                            
                                <label for="${brand}Color">Color: </label>                
                                <input type="text" name="${brand}Color" id="${brand}Color" value="${color}" readonly>
                            </li>
                            <li>                                                            
                                <label for="${brand}Model">Model: </label>                
                                <input type="text" name="${brand}Model" id="${brand}Model" value="${model}" readonly>
                            </li>
                            <li>                                                            
                                <label for="${brand}Price">Price: </label>
                                <input type="text" name="${brand}Price" id="${brand}Price" value="${price}" readonly>
                            </li>
                        </ul>
                    </div>
					`;
	return result;
}

//Process product data to be sent to server 
function sendDataProduct(brand){
	var name = "";				//product's name
	var quantity = "";			//product's quantity
	var color = "";				//product's color
	var model = "";				//product's model
	var price = "";				//product's price

	switch (brand){								//Get product's name
		case "merc":
			name = "Mercedes";
			break;
		case "audi":
			name = "Audi";
			break;
		case "bmw":
			name = "BMW";
			break;
		case "tesla":
			name = "Tesla";
			break;
	}

	var quantityKey = brand + "Quantity";
	var colorKey = brand + "Color";
	var modelKey = brand + "Model";
	var priceKey = brand + "Price";

	quantity = localStorage.getItem(quantityKey);	//get product's quantity
	color = localStorage.getItem(colorKey);			//get product's color
	model = localStorage.getItem(modelKey);			//get product's model
	price = localStorage.getItem(priceKey);			//get product's price

	var result = `${name} (${quantity}, ${color}, ${model}). `;
	return result;
}

//Calculate cost of products
function costCalc(brand){
	var result = 0;
	var quantityKey = brand + "Quantity";
	var quantity = Number(localStorage.getItem(quantityKey));		//get the quantity
	switch (brand){
		case "merc":
			result = 130000 * quantity;			//mercedes price calculated
			break;
		case "audi":
			result = 99000 * quantity;			//audi price calculated
			break;
		case "bmw":
			result = 164000 * quantity;			//bmw price calculated
			break;
		case "tesla":
			result = 245000 * quantity;			//tesla price calculated
			break;	
	}
	return result;													//return the total cost
}

//Validate the payment details
function validatePayment(){
	var name = document.getElementById("cardName").value.trim();					//name on card
	var cardNumber = document.getElementById("cardNumber").value.trim();			//credit card number
	var cardType = document.getElementById("cardType").value.trim();				//card type
	var expiry = document.getElementById("cardExpiry").value.trim();				//card expiry date
	var CVV = document.getElementById("cardCVV").value.trim();						//card CVV number
	var errMsg = "";
	var result = true;

	if (!debug){		//disable JavaScript validation
		//Card type validation
		if (cardType == "none"){
			errMsg += "Please select your card type.\n";
			result = false;
		}

		//Card name validation
		if (name == ""){
			errMsg += "Name of card cannot be left blank.\n";
			result = false;
		}
		else if (!(name.match(/^[a-zA-Z ]+$/))){							//check if name on card only contains alphabetical and space
			errMsg += "Card name can only contains alphabetical characters and spaces.\n";
			result = false;
		}
		else if (name.length > 40){											//check if length of name on card is not over 40
			errMsg += "Length of name of card cannot exceed 40 characters"
			result = false;
		}

		//Credit card number validation
		if (cardNumber == ""){
			errMsg += "Card number cannot be left blank.\n";
			result = false;
		}
		else{
			switch (cardType){
				case "visa": 																							//post code check for visa type
					if (cardNumber[0] != "4"){																			//check if first number is 4
						errMsg += "Visa card number must start with 4.\n";
						result = false;
					}
					else if (!(cardNumber.match(/^\d{16}$/))){															//check if length is 16 and only contains numbers
						errMsg += "Visa card number must be 16 digits and contains numbers only.\n";
						result = false;
					}
					break;
				case "master": 																							//post code check for mastercard type
					if (!(cardNumber[0] == "5" && (Number(cardNumber[1]) >= 1 && Number(cardNumber[1]) <= 5))){			//check if first 2 numbers are 51->55
						errMsg += `MasterCard must start with digits "51" through to "55".\n`;
						result = false;
					}
					else if (!(cardNumber.match(/^\d{16}$/))){															//check if length is 16 and only contains numbers
						errMsg += "MasterCard number must be 16 digits and contains numbers only.\n";
						result = false;
					}
					break;
				case "amex": 																							//post code check for amex type
					if (!(cardNumber[0] == "3" && (cardNumber[1] == "4" || cardNumber[1] == "7"))){						//check if first 2 numbers are 34 or 37
						errMsg += `American Express must start with "34" or "37".\n`;
						result = false;
					}
					else if (!(cardNumber.match(/^\d{15}$/))){															//check if length is 15 and only contains numbers
						errMsg += "MasterCard number must be 15 digits and contains numbers only.\n";
						result = false;
					}
					break;
			}
		}	

		//Card expiry date validation
		if (expiry == ""){
			errMsg += "Card expiry date cannot be left blank.\n";					//Check if expiry date is left empty
			result = false;
		}
		else if (!(expiry.match(/^\d{2}-\d{2}$/))){									//check if the format is matched with mm-dd
			errMsg += "Please enter expiry in the format of mm-yy.\n";
			result = false;
		}

		//CVV validation
		if (CVV == ""){
			errMsg += "CVV cannot be left blank.\n";								//Check if CVV is left empty
			result = false;
		}
		else if (!(CVV.match(/^\d{3}$/))){
			errMsg += "CVV must be a 3-digit number.\n";							//check if CVV is a 3-digit number
			result = false;
		}
	}
	
	if (errMsg != "")															//display error message if there is any error occurred
		alert(errMsg);

	return result;
}

//Clear storage memory and redirect to home page
function clearStorage(){
	localStorage.clear();
	location.href="index.php";
}

function init(){
	getInfo();		//fill up the page with stored information
	var cancel = document.getElementById("cancelOrder");
	var form = document.getElementById("paymentForm");
	cancel.onclick = clearStorage;
	form.onsubmit = validatePayment;
}

window.onload = init;