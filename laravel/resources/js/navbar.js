const navbar = document.getElementById("js-navbar");
const button = document.getElementById("js-hamburger");

var sw = 0;
button.addEventListener("click", function(e) {
    if (sw == 0) {
        sw++;
        navbar.style = "transform: translateX(0px);";
    } else {
        sw = 0;
        navbar.style = "";
    }
});
