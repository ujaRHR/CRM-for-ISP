@extends('layout.app')

@section('title', 'Manage Staffs | EarthLink')

@section('content')
@include('components.staffs.staff-list')
@include('components.staffs.create-staff')
@include('components.staffs.update-staff')
@include('components.staffs.delete-staff')
@endsection