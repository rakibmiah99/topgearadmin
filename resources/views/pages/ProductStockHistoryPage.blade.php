@extends('layouts.app')
@section('pageTitle','Stock History')
@section('content')
    @include('components.ProductStockHistory.List')
    @include('components.ProductStockHistory.Delete')
@endsection
