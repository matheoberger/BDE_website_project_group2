const navbar = document.getElementById("js-navbar");
const button = document.getElementById("js-hamburger");

var sw = 0;
//Pour les mobiles, gère la nabvar qui part et qui revient en appuyant sur le bouton hamburger
button.addEventListener("click", function(e) {
    if (sw == 0) {
        sw++;
        navbar.style = "transform: translateX(0px);";
    } else {
        sw = 0;
        navbar.style = "";
    }
});
