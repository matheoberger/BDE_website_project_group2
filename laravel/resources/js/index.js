window.verifForm = function(form) {
    console.log(verifMail(form.email));
    console.log(verifObject(form.object));
    console.log(verifText(form.subject));
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
    console.log(champ.value.length);
    isAnEmail = false;
    for (var j = 1; j < champ.value.length; j++) {
        console.log(0);
        if (champ.value.charAt(j) == "@") {
            console.log(1);
            if (j < champ.value.length - 4) {
                console.log(2);
                for (var k = j; k < champ.value.length - 2; k++) {
                    if (champ.value.charAt(k) == ".") {
                        console.log(3);
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
