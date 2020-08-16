var productID;
const querys = window.location.search.substring(1);//gets query string minus the "?"
var queryArray = querys.split("&"); // splits the query string into name=value pairs
for (var x = 0; x < queryArray.length; x++) {
    var splitted = queryArray[x].split("="); // seperates name from value

    if (splitted[0] == "ID") { //assigns image id for preload functionality
        productID = splitted[1];
        x = queryArray.length;
    }
}

var rows = 4;
var cols = 5;
var preloadArray = [];
var imagePath = "../../images/sliced/" + productID + '/' + productID;
for (var row = 0; row < rows; row++) {
    preloadArray[row] = []; //sets up the 2d array
    for (var col = 0; col < cols; col++) { //col controller
        preloadArray[row][col] = new Image(); //assigns each array location as image
        preloadArray[row][col].src = imagePath + '_r' + (row + 1) + '_c' + (col + 1) + '.jpg'; //sets each array image's src 
    }
}

// Please note: the actual image assembly code can be found at the bottom of formFunctions.js as it is implemeted with innerHTML which requires the page to be populated with elements first
//.onLoad statement can also be found in formFunctions.js