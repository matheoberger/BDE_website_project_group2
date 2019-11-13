window.verifForm = function(form) {
    //lancer les différents tests poru vérifier les champs du formulaire
    if (
        verifMail(form.email) &&
        verifObject(form.object) &&
        verifText(form.subject)
    )
        return true;
    else {
        alert("Veuillez remplir correctement tous les champs");
        return false;
    }
};

window.verifMail = function(champ) {
    isAnEmail = false;
    for (var j = 1; j < champ.value.length; j++) {
        //chercher le caractère @
        if (champ.value.charAt(j) == "@") {
            //verifier qu'il y a au moins 4 caractère dérrière @
            if (j < champ.value.length - 4) {
                for (var k = j; k < champ.value.length - 2; k++) {
                    //verifier qu'il y a un point derière @
                    if (champ.value.charAt(k) == ".") {
                        isAnEmail = true;
                    }
                }
            }
        }
    }
    return isAnEmail;
};

window.verifObject = function(champ) {
    if (champ.value.length <= 10) {
        return false;
    } else {
        return true;
    }
};

window.verifText = function(champ) {
    if (champ.value.length <= 50) {
        return false;
    } else {
        return true;
    }
};
