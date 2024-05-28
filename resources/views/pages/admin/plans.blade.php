@extends('layout.app')

@section('title', 'Manage Plans | EarthLink')

@section('content')
@include('components.plans.plan-list')
@include('components.plans.create-plan')
@include('components.plans.update-plan')
@include('components.plans.delete-plan')
@endsection