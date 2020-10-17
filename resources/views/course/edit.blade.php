@extends('course.course')
@section('formaction',"course/$course->id")
@section('name',$course->name)

@section('formmenthod')
{{ method_field('PATCH') }}
@endsection