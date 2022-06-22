@extends('layouts.app')
@section('pageTitle','Site Info')
@section('content')
    @include('components.SiteInfo.List')
    @include('components.SiteInfo.Details')
    @include('components.SiteInfo.Create')
    @include('components.SiteInfo.Update')
    @include('components.SiteInfo.Delete')
@endsection
