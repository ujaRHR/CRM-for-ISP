@extends('layout.customer')

@section('title', 'Profile | EarthLink')

@section('content')
@include('components.customers.customer.customer-profile')
@include('components.customers.customer.edit-customer')
@endsection