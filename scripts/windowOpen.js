// Functions to check if duplicate members order widow is open 
var orderWindow; //defines variable

function openNewPopup(url) { //this is mainly for mobile devices 
    var clientWidth = window.innerWidth; //gets device window width
    var clientHeight = window.innerHeight; //gets device window height

    if (clientWidth < 700) {
        var size = "width=" + clientWidth + "," + "height=" + clientHeight; //assigns size variable with values of innerWidth and innerHeight
        orderWindow = window.open(url, "newWindow", size ); //sets popup window to size of screen
        //what this above function does is mainly for window sizing when viewing in developer mode while testing different browser sizes
        
    }
        else {

            orderWindow = window.open(url, "newWindow", "width=730, height=750"); //assigns popup window to variable
        }
    }

    function closeOpenPopup() {
        if (orderWindow) {
            orderWindow.close(); //closes order window
        }
    }

    function productLink(url) {
        if ((!orderWindow) || (orderWindow.closed)) { //checks if popup order window has ever been opened or if it is currently closed
            openNewPopup(url); //Opens popup window
        } else if (orderWindow.open) { //checks if order popup window is open
            closeOpenPopup(); //if it is, it closes the window

            if (orderWindow.closed) { //outputs to console for testing purposes (would be removed in a real world application)
                console.log("duplicate popup closed"); //test purposes. would be removed in real world application
            }
            openNewPopup(url); //Opens popup window
        }
    }