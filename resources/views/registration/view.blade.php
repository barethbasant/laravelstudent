@extends('layout.app')

@section('body')
<br>
<h2 style="text-align:center;">Registration Detail 
<a class="btn btn-success" href="{{url('/')}}/registration/create" style="float:right;">New</a>
<a href="{{url('/')}}/registration-pdf" class="btn btn-warning" style="float:left;" target="_blank">Print</a>
<a href="{{url('/')}}/registration-excel" class="btn btn-success" style="float:left;" target="_blank">Export</a>
</h2> 


    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">FName</th>
            <th scope="col">LName</th>
            <th scope="col">DOB</th>
            <th scope="col">Course</th>
            <th scope="col">Branch</th>
            <th scope="col">City</th>
            <th scope="col">Action</th> 
            </tr>
        </thead>
        <tbody>
        @foreach($registrations as $registration)
            <tr>
            <th scope="row">{{$loop->index +1}}</th>
            <td>{{$registration->fname}}</td>
            <td>{{$registration->lname}}</td>
            <td>{{$registration->dob}}</td>
            <td>{{$registration->courses->name}}</td>
            <td>{{$registration->branches->name}}</td>  
            <td>{{$registration->cities->name}}</td>            
            <td>
          
                
                <form action="{{url('/')}}/registration/{{$registration->id}}" method="post">
                @csrf
                <a href="{{url('/')}}/registration/{{$registration->id}}/edit" class="btn btn-primary">E</a>
                <button type="submit" name="submit" class="btn btn-danger">X</button>
                    {{ method_field('DELETE') }}
                   
                </form>                
            </td> 
            </tr>  
        @endforeach             
        </tbody>
    </table>
@endsection