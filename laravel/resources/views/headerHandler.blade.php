
@component('header');
@slot('notification')
<a class="navbar navbar__notifications" href="#"> aze </a>
@endslot

@slot('search')
<input type="text" class="navbar navbar_search">
@endslot

@slot('account')
<a class="navbar navbar__user" href="#"> login </a>
@endslot

@endcomponent
