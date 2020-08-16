// Navbar script

function navigation() {
  var x = document.getElementById("naviBar"); //Get the navbar from DOM
  if (x.className === "naviBar") {
    x.className += " responsive"; //adds responsive class to navbar for mobile and tablet
  } else {
    x.className = "naviBar"; //removes responsive class
  }
}