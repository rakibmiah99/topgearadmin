@extends('layouts.app')
@section('pageTitle','Product Specification')
@section('content')
    @include('components.ProductSpecification.List')
    @include('components.ProductSpecification.Details')
    @include('components.ProductSpecification.Create')
    @include('components.ProductSpecification.Update')
    @include('components.ProductSpecification.Delete')
@endsection
