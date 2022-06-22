@extends('layouts.app')
@section('pageTitle','Product Stock')
@section('content')
    @include('components.ProductStock.List')
    @include('components.ProductStock.Create')
    @include('components.ProductStock.Delete')
@endsection
