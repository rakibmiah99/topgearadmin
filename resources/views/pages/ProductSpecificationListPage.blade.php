@extends('layouts.app')
@section('pageTitle','Product Specification List')
@section('content')
    @include('components.ProductSpecification.SpecificList')
  @include('components.ProductSpecification.Details')
 @include('components.ProductSpecification.Create')
 @include('components.ProductSpecification.Update')
  @include('components.ProductSpecification.Delete')
@endsection
