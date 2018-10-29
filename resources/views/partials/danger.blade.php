@if(session()->has('danger'))
<div class="notification is-danger">
  <button class="delete"></button>
  {!!session()->get('danger')!!}
</div>
@endif