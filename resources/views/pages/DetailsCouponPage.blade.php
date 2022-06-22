@extends('layouts.app')
@section('pageTitle','Coupon')
@section('content')
    @include('components.DetailsCoupon.List')
    @include('components.DetailsCoupon.Create')
    @include('components.DetailsCoupon.Update')
    @include('components.DetailsCoupon.Delete')
@endsection
