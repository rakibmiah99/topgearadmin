@extends('layouts.app')
@section('pageTitle','SSL Payment')
@section('content')
    @include('components.SSLPayment.List')
    @include('components.SSLPayment.Details')
@endsection
