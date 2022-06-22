@extends('layouts.app')
@section('pageTitle','Card Brand')
@section('content')
    @include('components.CarBrand.List')
    @include('components.CarBrand.Create')
    @include('components.CarBrand.Update')
    @include('components.CarBrand.Delete')
@endsection
