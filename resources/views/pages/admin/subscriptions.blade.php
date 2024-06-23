@extends('layout.app')

@section('title', 'Manage Subscriptions | EarthLink')

@section('content')
@include('components.subscriptions.admin.subscription-list')
@include('components.subscriptions.admin.update-subscription')
@endsection