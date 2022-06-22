@extends('layouts.app')
@section('pageTitle','Service Request')
@section('content')
    @include('components.ServiceRequest.List')
    @include('components.ServiceRequest.Details')
    @include('components.ServiceRequest.Delete')
    @include('components.ServiceRequest.ChangeStatus')
@endsection
