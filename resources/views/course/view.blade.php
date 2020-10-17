@extends('layout.app')

@section('body')
<br>
<h2 style="text-align:center;">Course Master Detail <a class="btn btn-success" href="{{url('/')}}/course/create" style="float:right;">New</a></h2> 


    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">FName</th>
            <th scope="col">Action</th> 
            </tr>
        </thead>
        <tbody>
        @foreach($courses as $course)
            <tr>
            <th scope="row">{{$loop->index +1}}</th>
            <td>{{$course->name}}</td>
            <td>
          
                
                <form action="{{url('/')}}/course/{{$course->id}}" method="post">
                @csrf
                <a href="{{url('/')}}/course/{{$course->id}}/edit" class="btn btn-primary">E</a>
                <button type="submit" name="submit" class="btn btn-danger">X</button>
                    {{ method_field('DELETE') }}
                   
                </form>                
            </td> 
            </tr>  
        @endforeach             
        </tbody>
    </table>
@endsection