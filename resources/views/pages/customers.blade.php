@extends('layout.app')

@section('title', 'Manage Customers | EarthLink')

@section('content')
  @include('components.customers.customer-list')
  @include('components.customers.create-customer')
@endsection