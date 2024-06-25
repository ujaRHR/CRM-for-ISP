@extends('layout.app')

@section('title', 'Manage Tickets | EarthLink')

@section('content')
@include('components.tickets.admin.ticket-list')
@endsection