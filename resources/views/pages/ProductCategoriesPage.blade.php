@extends('layouts.app')
@section('pageTitle','Product Category')
@section('content')
    @include('components.ProductCategories.List')
    @include('components.ProductCategories.Details')
    @include('components.ProductCategories.Create')
    @include('components.ProductCategories.Update')
    @include('components.ProductCategories.Delete')
@endsection
