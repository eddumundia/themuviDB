@extends('layouts.app')

@section('content')

@include('layouts.tvsearch')
<div class="container">
    <form method="POST" action="{{ url('/shop') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                  <label for="shop">Shop name</label>
                  <input type="text" class="form-control" id="firstoption" name="shop_name" placeholder="Shop name" required>
                </div>

            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div> 
@endsection

@push('scripts')

