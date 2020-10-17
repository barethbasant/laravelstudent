@extends('layout.app')

@section('body')
<br>
<h2 style="text-align:center;">Student Registration<a class="btn btn-success" href="{{url('/')}}/registration/" style="float:right;">Back</a></h2>
<form method="post" action="{{url('/')}}/@yield('formaction')" autocomplete="off" enctype="multipart/form-data" >
@csrf
@yield('formmenthod')
  <div class="form-group">
    <label for="name">First Name</label>
    <input type="text" class="form-control" id="fname" name="fname" value="@yield('fname')" aria-describedby="fname">
  </div>

  <div class="form-group">
    <label for="name">Last Name</label>
    <input type="text" class="form-control" id="lname" name="lname" value="@yield('lname')" aria-describedby="lname">
  </div>

  <div class="form-group">
    <label for="name">Date Of Birth</label>
    <input type="text" class="form-control" id="dob" name="dob" value="@yield('dob')" aria-describedby="dob">
  </div>

  <div class="form-group">
    <label for="name">City</label>
    <select name="city_id" id="city_id" class="form-control">
    @foreach($cities as $city)
    <option value="{{$city->id}}">{{$city->name}}</option>
    @endforeach
    </select>
    <script>document.getElementById('city_id').value="@yield('city_id')";</script>
  </div>

  <div class="form-group">
    <label for="name">Course</label>
    <select name="course_id" id="course_id" class="form-control">
    @foreach($courses as $course)
    <option value="{{$course->id}}">{{$course->name}}</option>
    @endforeach
    </select>
    <script>document.getElementById('course_id').value="@yield('course_id')";</script>
  </div>

  <div class="form-group">
    <label for="name">Branch</label>
    <select name="branch_id" id="branch_id" class="form-control">
    @foreach($branches as $branch)
    <option value="{{$branch->id}}">{{$branch->name}}</option>
    @endforeach
    </select>
    <script>document.getElementById('branch_id').value="@yield('branch_id')";</script>
  </div>

  <div class="form-group">
    <label for="photo">Photo</label>
    <input type="file" name="photo" class="form-control">
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