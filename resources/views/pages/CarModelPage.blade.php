@extends('layouts.app')
@section('pageTitle','Car Model')
@section('content')
    @include('components.CarModel.List')
    @include('components.CarModel.Create')
    @include('components.CarModel.Update')
    @include('components.CarModel.Delete')
@endsection
