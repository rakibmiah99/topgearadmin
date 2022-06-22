@extends('layouts.app')
@section('pageTitle','User Profile')
@section('content')
    @include('components.UserProfile.List')
    @include('components.UserProfile.Details')
@endsection
