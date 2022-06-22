@extends('layouts.app')
@section('pageTitle','Blog')
@section('content')
    @include('components.Blogs.List')
    @include('components.Blogs.Details')
    @include('components.Blogs.Create')
    @include('components.Blogs.Update')
    @include('components.Blogs.Delete')
@endsection

