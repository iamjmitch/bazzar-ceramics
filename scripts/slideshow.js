window.addEventListener('hashchange', function() {
    event.preventDefault;
  }, false);


var currentSlide = 1;
var running = false;
var timer;
const slides = document.getElementsByClassName("slider");
const slideContainer = document.getElementsByClassName("productionSlider")
const sliderArray = document.getElementsByClassName("slider")


//loading scripts
for (var t=0; t < sliderArray.length; t++){ //adds css animation. loaded by JS so the class isnt active when JS turned off in browser
  sliderArray[t].classList.add("fade2");
}


for (var sn = 0; sn < slides.length; sn++){ //setup to hide all other slides except slide1. this is a bug fix for first slide change animations
    if (sn != 0){
        slides[sn].style.display = "none";
    }
}


function slideToggle(n) { 
    if (running == false) { //checks if slideshow should start, changes slide and starts timer
        currentSlide = n;
        changeSlide(n);
        startTimer();


    } else {
        currentSlide = n; //checks if slideshow should stop, changes slide and stops timer
        changeSlide(n);
        stopTimer();

    }
}


function isRunning(n) { //fixes bug where slideshow  on/off wouldnt toggle
    if (running == true) {
        changeSlide(n)
    }
}



function changeSlide(n) {
    for (cs = 1; cs <= slides.length; cs++){
        if (cs == n){
            slides[(cs-1)].style.display = "block"; //changes active slide to block to become visible
        }
        else{
            slides[(cs-1)].style.display = "none"; //hides all other slides
        }   
    }
}

// Original way documented below however went with the above to prevent page jumping when directing to element anchor 
// function changeSlide(n) {
//     if (n == 1) {
//         window.location.href = "#slide1";

//     } else if (n == 2) {
//         window.location.href = "#slide2";

//     } else if (n == 3) {
//         window.location.href = "#slide3";

//     } else if (n == 4) {
//         window.location.href = "#slide4";

//     } else if (n == 5) {
//         window.location.href = "#slide5";
//     }
// }

function slideIncrease() { //function to change the slide values used in changeSlide()
    if (running == true) {
        if (currentSlide < slides.length) {
            currentSlide = currentSlide + 1;
        } else {
            currentSlide = 1; //resets slider count 
        }

        changeSlide(currentSlide); //runs function to actually change the slide
    } else {
        stopTimer(); // stops auto slideshow
    }
}



//starts auto slideshow
function startTimer() {
    timer = setInterval(slideIncrease, 5000); //slide interval of 5seconds
    running = true;

}

//stops auto slideshow
function stopTimer() {
    clearInterval(timer); //stops auto slideshow
    running = false;
}

stopTimer(); //slideshow stopped by default