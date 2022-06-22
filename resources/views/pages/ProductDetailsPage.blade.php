@extends('layouts.app')
@section('pageTitle','Product Details')
@section('content')
    @include('components.ProductDetails.List')
    @include('components.ProductDetails.Details')
    @include('components.ProductDetails.Create')
    @include('components.ProductDetails.Update')
    @include('components.ProductDetails.Delete')
@endsection
