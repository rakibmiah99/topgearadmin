@extends('layouts.app')
@section('pageTitle','Gallery')
@section('content')
    @include('components.Gallery.List')
    @include('components.Gallery.Details')
    @include('components.Gallery.Create')
    @include('components.Gallery.Update')
    @include('components.Gallery.Delete')
@endsection
