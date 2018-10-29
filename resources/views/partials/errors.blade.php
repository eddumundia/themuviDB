@if(isset($errors) && count($errors) > 0)
<div class="notification is-danger">
    <button class="delete"></button>
    @foreach($errors->all() as $error)
    <li><strong>{!! $error !!}</strong></li>
    @endforeach
</div>
@endif