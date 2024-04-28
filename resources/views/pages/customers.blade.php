@extends('layout.app')

@section('title', 'Manage Customers | EarthLink')

@section('content')
  @include('components.customers.customer-list')
  @include('components.customers.create-customer')
  @include('components.customers.delete-customer')
@endsection