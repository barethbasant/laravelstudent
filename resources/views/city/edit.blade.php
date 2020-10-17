@extends('city.city')
@section('formaction',"city/$city->id")
@section('name',$city->name)

@section('formmenthod')
{{ method_field('PATCH') }}
@endsection