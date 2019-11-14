@extends('layout.loginLayout')

@section('Title')
Inscription
@endsection

@section('form')
<div class="input-group form-group">
    <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-key"></i></span>
    </div>
    <input type="password" name="verif_password" class="form-control" placeholder="Verification mot de passe" required="required">
</div>
<div class="input-group form-group">
    <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-user"></i></span>
    </div>
    <input type="text" name="lastname" class="form-control" placeholder="Nom" required="required">
</div>
<div class="input-group form-group">
    <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-user"></i></span>
    </div>
    <input type="text" name="firstname" class="form-control" placeholder="Prénom" required="required">
</div>
<div class="input-group form-group">
    <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-user"></i></span>
    </div>
    <input type="text" name="birthdate" class="form-control" placeholder="Date de naissancce" required="required">
</div>
<div class="input-group form-group">
    <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-user"></i></span>
    </div>
    <input type="text" name="genre" class="form-control" placeholder="Genre" required="required">
</div>
@endsection

@section('check')
J'ai lu et accepte les conditions générales
@endsection

@section('endlink1')
<a href="/mentionslegales">Conditions générales</a>
@endsection

@section('endlink2')
Vous avez déja un compte ?<a href="/login">Se connecter</a>
@endsection