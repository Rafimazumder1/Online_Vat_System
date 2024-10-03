@extends('layout.master');

@section('page-title','Welcome');

@section('content')
<div class="container-fluid px-4" >
    <p class="text-primary text-xl-center fs-1 fst-italic shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        Welcome To VAT Software,
    </p>

    @if(session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
@endif

@if(session('company_name'))
    <p>Company Name: {{ session('company_name') }}</p>
@else
    <p>Company Name: N/A</p>
@endif





    @if(Auth::check())
    <p>Welcome, {{ Auth::user()->apps_user }}!</p>
    <p>Company Code: {{ auth::user()->company_code }}</p>
    @else
        <p>Please log in.</p>
    @endif

    <div class="d-flex justify-content-center align-items-center">
        <img src="{{ asset('image/icon.jpg') }}" alt="Company Logo" class="img-fluid">
    </div>


</div>
@endsection
