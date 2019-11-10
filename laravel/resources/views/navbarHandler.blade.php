
@component('navbar');
@slot('notification')
<img src="/images/bell.png" class="navbar navbar__notification"/>
@endslot

@slot('search')
<input type="text" class="navbar navbar_search">
@endslot

@slot('account')
<a class="navbar navbar__user" href="#"> login </a>
@endslot

@endcomponent
