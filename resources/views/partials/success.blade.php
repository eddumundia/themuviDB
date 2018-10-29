@if(session()->has('success'))
<div class="notification is-success">
  <button class="delete"></button>
  {!!session()->get('success')!!}
</div>
@endif