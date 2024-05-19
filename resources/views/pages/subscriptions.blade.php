@extends('layout.app')

@section('title', 'Manage Subscriptions | EarthLink')

@section('content')
@include('components.subscriptions.plan-list')
@include('components.subscriptions.create-plan')
@include('components.subscriptions.update-plan')
@include('components.subscriptions.delete-plan')
@endsection