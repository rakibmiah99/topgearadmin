@extends('layouts.app')
@section('pageTitle','Settings')
@section('content')
    @include('components.Settings.List')
    @include('components.Settings.Create')
    @include('components.Settings.Update')
    @include('components.Settings.Delete')
@endsection
