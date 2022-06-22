@extends('layouts.app')
@section('pageTitle','Product Brand')
@section('content')
    @include('components.ProductBrand.List')
    @include('components.ProductBrand.Create')
    @include('components.ProductBrand.Update')
    @include('components.ProductBrand.Delete')
@endsection
