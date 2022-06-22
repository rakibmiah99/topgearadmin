@extends('layouts.app')
@section('pageTitle','Product List')
@section('content')
    @include('components.ProductList.List')
    @include('components.ProductList.Details')
    @include('components.ProductList.Create')
    @include('components.ProductList.Update')
    @include('components.ProductList.Delete')
@endsection
