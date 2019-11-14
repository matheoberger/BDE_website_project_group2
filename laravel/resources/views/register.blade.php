@extends('layout.loginLayout')

@section('Title')
Inscription
@endsection

@section('form')
<div class="input-group form-group">
    <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-key"></i></span>
    </div>
    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmation mot de passe" required="required">
</div>
<div class="input-group form-group">
    <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-user"></i></span>
    </div>
    <input type="text" name="lastname" class="form-control" placeholder="Nom" required="required" <?php if (isset($_POST['lastname'])) {
                                                                                                        echo "value = '" . $_POST['lastname'] . "'";
                                                                                                    } ?>>
</div>
<div class="input-group form-group">
    <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-user"></i></span>
    </div>
    <input type="text" name="firstname" class="form-control" placeholder="Prénom" required="required" <?php if (isset($_POST['firstname'])) {
                                                                                                            echo "value = '" . $_POST['firstname'] . "'";
                                                                                                        } ?>>
</div>
<div class="input-group form-group">
    <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-table"></i></span>
    </div>
    <input type="text" name="birthdate" class="form-control" placeholder="Date de naissancce (AAAA-MM-JJ)" required="required" <?php if (isset($_POST['birthdate'])) {
                                                                                                                                    echo "value = '" . $_POST['birthdate'] . "'";
                                                                                                                                } ?>>
</div>
<div class="input-group form-group">
    <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
    </div>
    <select name="gender" class="form-control" required="required">
        <option value="">--Choisissez votre sexe--</option>
        <option value="male">Homme</option>
        <option value="female">Femme</option>
    </select>
</div>
<div class="input-group form-group">
    <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
    </div>
    <select name="center" class="form-control" required="required">
        <option value="Aix-en-Provence">Aix-en-Provence</option>
        <option value="Angouleme">Angoulême</option>
        <option value="Arras">Arras</option>
        <option value="Bordeaux" selected>Bordeaux</option>
        <option value="Brest">Brest</option>
        <option value="Caen">Caen</option>
        <option value="Chateauroux">Chateauroux</option>
        <option value="Dijon">Dijon</option>
        <option value="Grenoble">Grenoble</option>
        <option value="La Rochelle">La Rochelle</option>
        <option value="Le Mans">Le Mans</option>
        <option value="Lille">Lille</option>
        <option value="Lyon">Lyon</option>
        <option value="Montpellier">Montpellier</option>
        <option value="Nancy">Nancy</option>
        <option value="Nantes">Nantes</option>
        <option value="Nice">Nice</option>
        <option value="Paris Nanterre">Paris Nanterre</option>
        <option value="Pau">Pau</option>
        <option value="Reims">Reims</option>
        <option value="Saint-Nazaire">Saint-Nazaire</option>
        <option value="Strasbourg">Strasbourg</option>
        <option value="Toulouse">Toulouse</option>
    </select>
</div>
@endsection

@section('check')
<input type="checkbox" name="check" required="required"> J'ai lu et accepte les conditions générales
@endsection

@section('endlink1')
<a href="/mentionslegales">Conditions générales</a>
@endsection

@section('endlink2')
Vous avez déja un compte ?<a href="/login">Se connecter</a>
@endsection