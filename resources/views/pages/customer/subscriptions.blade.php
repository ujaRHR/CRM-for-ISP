@extends('layout.customer')

@section('title', 'Subscriptions | EarthLink')

@section('content')
@include('components.subscriptions.customer.subscription-info')
@include('components.subscriptions.customer.subscription-list')
@endsection