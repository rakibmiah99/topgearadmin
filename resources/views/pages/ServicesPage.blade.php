@extends('layouts.app')
@section('pageTitle','Services')
@section('content')
    @include('components.Services.List')
    @include('components.Services.Details')
    @include('components.Services.Create')
    @include('components.Services.Update')
    @include('components.Services.Delete')
@endsection