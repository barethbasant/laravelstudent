@extends('registration.registration')
@section('formaction',"registration/$registration->id")
@section('fname',$registration->fname)
@section('lname',$registration->lname)
@section('dob',$registration->dob)
@section('city_id',$registration->city_id)
@section('course_id',$registration->course_id)
@section('branch_id',$registration->branch_id)

@section('formmenthod')
{{ method_field('PATCH') }}
@endsection