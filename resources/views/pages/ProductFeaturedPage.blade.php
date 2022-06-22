@extends('layouts.app')
@section('pageTitle','Product Featured')
@section('content')
    @include('components.ProductFeatured.List')
    @include('components.ProductFeatured.Details')
    @include('components.ProductFeatured.Create')
    @include('components.ProductFeatured.Update')
    @include('components.ProductFeatured.Delete')
@endsection

