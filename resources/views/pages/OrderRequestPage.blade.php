@extends('layouts.app')
@section('pageTitle','Order Request')
@section('content')
    @include('components.OrderRequest.List')
    @include('components.OrderRequest.Details')
{{--    @include('components.OrderRequest.Create')--}}
    @include('components.OrderRequest.Update')
    @include('components.OrderRequest.Delete')
@endsection
