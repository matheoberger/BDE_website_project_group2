@extends('layouts.loginLayout')

@section('Title', 'Connexion')

@section('check')
<div class="row align-items-center remember">
    <input type="checkbox" name="check"> Se souvenir de moi
</div>
@endsection

@section('endlink1')
Vous n'avez pas de compte ?<a href="/register">Inscrivez vous</a>
@endsection