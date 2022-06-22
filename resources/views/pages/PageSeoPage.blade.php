@extends('layouts.app')
@section('pageTitle','Page SEO')
@section('content')
@include('components.PageSeo.List')
@include('components.PageSeo.Details')
@include('components.PageSeo.Create')
@include('components.PageSeo.Update')
@include('components.PageSeo.Delete')
@endsection
