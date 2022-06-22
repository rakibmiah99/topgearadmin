@extends('layouts.app')
@section('pageTitle','Notification')
@section('content')
    @include('components.Notification.List')
    @include('components.Notification.Create')
    @include('components.Notification.Delete')
@endsection
