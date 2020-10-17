@extends('branch.branch')
@section('formaction',"branch/$branch->id")
@section('name',$branch->name)

@section('formmenthod')
{{ method_field('PATCH') }}
@endsection