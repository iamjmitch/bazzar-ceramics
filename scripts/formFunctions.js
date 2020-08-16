//This script is run at the end of the body as it contains getElements which first needs to be painted

// Global Variables
// Get qty element
const qty = document.getElementById('qty');
// get price element
const price = document.getElementById('price');
// get total price element
const totalPrice = document.getElementById('totalPrice');
// get the form element
const form = document.getElementById('form');
// get page heading (h1)
const title = document.getElementById('title');
// get page name
const name = document.getElementById('name');
// get item description element
const desc = document.getElementById('itemDesc');
//get image slices container
const imageContent = document.getElementById('imageContent');
//get calculate total button
const calcButton = document.getElementById('calcButton');
//get submit  button
const subButton = document.getElementById('ordersubmit');
//get reset button
const reset = document.getElementById('reset');
//get hidden fireld containing product id
const prodID = document.getElementById('productID');
//get hidden fireld containing product name
const hiddenName = document.getElementById('hiddenItemName');
//get hidden fireld containing product name
const hiddenPrice = document.getElementById('hiddenPrice');
//get hidden fireld containing product name
const hiddenItemDesc = document.getElementById('hiddenItemDesc');






// Calls for the images slices to be assembled after all jpg files have been loaded
preloadArray.onLoad = sliceImage();


// declare form global variables//
var productName;
var productDesc;
var productPrice;
var defaultQty;
var productID



//this function assigns query string values to relevant global variables
for (qNum = 0; qNum < queryArray.length; qNum++) {
    var qNum; //counter
    var tempStr; // temporary string holder
    var splitted = queryArray[qNum].split("="); // seperates name from value

    if (splitted[0] == "ID") { //could have also used "switch" function
        if (productID == "") {
            tempStr = splitted[1]; // Assigns the value to a temporary string to be used in next step
            productID = tempStr.replace(/%20/g, " "); // assigns value to correct variable and removes %20 and replaces with a white space
        } else {
            console.log("value " + productID + " has already been assigned to 'productID'");
        }

    } else if (splitted[0] == "name") { //could have also used "switch" function
        tempStr = splitted[1]; // Assigns the value to a temporary string to be used in next step
        productName = tempStr.replace(/%20/g, " "); // assigns value to correct variable and removes %20 and replaces with a white space

    } else if (splitted[0] == "desc") {
        tempStr = splitted[1];
        productDesc = tempStr.replace(/%20/g, " ");

    } else if (splitted[0] == "price") {
        tempStr = splitted[1];
        productPrice = tempStr.replace(/%20/g, " ");

    } else if (splitted[0] == "defaultQty") {
        tempStr = splitted[1];
        defaultQty = tempStr.replace(/%20/g, " ");

    } else {
        console.log(splitted[0] + " is not found"); //outputs to console if a variable in the passed query string does not match any existing
    }



}

// Variable loading expressions
document.title = 'Order Item - ' + productName; //Sets page title
title.innerHTML = productName;//sets page heading
name.innerHTML = productName;
desc.innerHTML = productDesc; //sets the product description input
price.innerHTML = "$" + productPrice; // sets product price input
qty.value = defaultQty; //sets default qty. Could probably have been hard coded however didnt want to risk loosing marks as this is a variable passing assignment


// load values for hidden
prodID.value = productID;
hiddenName.value = productName;
hiddenItemDesc.value = productDesc;
hiddenPrice.value = productPrice;



//These are simply for value checking and play no part in the actual functionality. Would be removed in a real world application
console.log("productID = " + productID);
console.log("productName = " + productName);
console.log("productDesc = " + productDesc);
console.log("productPrice = " + productPrice);
console.log("defaultQty = " + defaultQty);
console.log("Page Title = " + document.title);




//this function updates the total order price value along with providing a validation output(true/false) for if the user hits submit before calculating the total price.
function calcTotal() {
    if (qty.value == "") { //Shows below alert if qty field is left blank
        // alert("Quantity was left blank. Please enter a Quantity");
        totalPrice.innerHTML = ""; //resets totalvalue to blank
        return false; // false to be returned and output used in submit()
    } else if ((Number.isInteger(parseFloat(qty.value)) == false) || (qty.value < 1)) { //shows below alert if qty is a number with decimal (eg 1.1) or is a negative number(eg -1)
        // alert('"' + qty.value + '"' + " Is Not A Valid Quantity.\nQuantity Must Be A Whole Number And Greater Than 0");
        totalPrice.innerHTML = ""; //resets totalvalue to blank
        return false; // false to be returned and output used in submit()
    } else {
        var s = price.innerHTML;
        if (s.charAt(0) === "$") {
            s = s.substring(1);
        }

        totalPrice.innerHTML = "$" + ((parseInt(qty.value, 10)) * (parseInt(s, 10))); //Updates total price

    }
    return true; // true to be returned and output used in submit()
}



// Function to clear the qty and totalPrice values
function clearForm() {
    qty.value = "";
    totalPrice.innerHTML = "";
}


//form action controller function
function submit(event) {
    if (true == calcTotal()) { //makes sure that calculate total price is run to verify form contents before hitting "submit" if user has not done so. calcTotal() must return true to continue the order   
        var itemDesc = document.getElementById('itemDesc').innerHTML;
        var confirmed = confirm("Product: " + productName + "\nItem Description: " + itemDesc + "\nQuantity: " + qty.value + "\nUnit Price: " + price.innerHTML + "\nTotal Order Price: " + totalPrice.innerHTML + "\n\nPlease Confirm Your Order Details Are Correct");
        if (confirmed == true) {
            form.submit();
        } //if "ok" is selected the form does nothing
        else { //if "cancel" button is clicked, the below alert displays and clearForm() is executed
            alert("Order was cancelled. Order Quantity & Total Order Price will now be cleared");
            event.preventDefault();
            clearForm();
        }
    } else {}
}


//function to close window when "close" link is clicked
function closeThisWindow() {
    window.open('', '_self').close();
}





// Adds event listener to the forms submit event, blocks it and runs the function submit()
form.addEventListener('submit', submit);
calcButton.addEventListener('click', calcTotal);
reset.addEventListener('click', clearForm);

function sliceImage() {
    var table = ""; //define as empty string

    for (row = 0; row < rows; row++) { //Row Controller
        table += '<tr>'; //Opens table row
        for (col = 0; col < cols; col++) { //col controller
            table += '<td><img src="' + preloadArray[row][col].src + '"></td>';
        }
        table += '</tr>'; //closes table row everytime col=cols
    }
    imageContent.innerHTML =  table ; //outputs html to whatever div the function is called from
    imageContent.style.margin = "0 auto";
}