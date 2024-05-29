@extends('layout.app')

@section('title', 'Manage Customers | EarthLink')

@section('content')
  @include('components.customers.admin.customer-list')
  @include('components.customers.admin.create-customer')
  @include('components.customers.admin.update-customer')
  @include('components.customers.admin.delete-customer')
@endsection