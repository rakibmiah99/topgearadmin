@extends('layouts.app')
@section('pageTitle','Testimonial')
@section('content')
    @include('components.Testimonial.List')
    @include('components.Testimonial.Create')
    @include('components.Testimonial.Update')
    @include('components.Testimonial.Delete')
@endsection
