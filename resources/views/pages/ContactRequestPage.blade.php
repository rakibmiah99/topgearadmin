@extends('layouts.app')
@section('pageTitle','Contact Request')
@section('content')
    @include('components.ContactRequest.List')
    @include('components.ContactRequest.Delete')
@endsection
