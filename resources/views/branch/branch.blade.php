@extends('layout.app')

@section('body')
<br>
<h2 style="text-align:center;">Branch Master <a class="btn btn-success" href="{{url('/')}}/branch/" style="float:right;">Back</a></h2>
<form method="post" action="{{url('/')}}/@yield('formaction')" autocomplete="off" >
@csrf
@yield('formmenthod')
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="@yield('name')" aria-describedby="name">
  </div>
  
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>

<br>
    @if(count($errors)>0)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger"> {{$error}}</div>   
        @endforeach
    @endif
@endsection