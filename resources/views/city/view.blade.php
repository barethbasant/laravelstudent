@extends('layout.app')

@section('body')
<br>
<h2 style="text-align:center;">City Master Detail <a class="btn btn-success" href="{{url('/')}}/city/create" style="float:right;">New</a></h2> 


    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th> 
            </tr>
        </thead>
        <tbody>
        @foreach($cities as $city)
            <tr>
            <th scope="row">{{$loop->index +1}}</th>
            <td>{{$city->name}}</td>
            <td>
          
                
                <form action="{{url('/')}}/city/{{$city->id}}" method="post">
                @csrf
                <a href="{{url('/')}}/city/{{$city->id}}/edit" class="btn btn-primary">E</a>
                <button type="submit" name="submit" class="btn btn-danger">X</button>
                    {{ method_field('DELETE') }}
                   
                </form>                
            </td> 
            </tr>  
        @endforeach             
        </tbody>
    </table>
@endsection