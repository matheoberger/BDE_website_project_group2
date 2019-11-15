if (confirm("Veuillez accepter les cookies")) {
    document.cookie = "accept_cookie  = 'true' ; path=/";
} else {
    document.location.href = "http://www.google.com";
}
