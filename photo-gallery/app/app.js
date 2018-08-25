
var app = angular.module('photoApp',[]);

function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

// function share()
// {
//     window.open('https://www.facebook.com/');
// }