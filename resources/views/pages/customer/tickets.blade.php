@extends('layout.customer')

@section('title', 'Support Tickets | EarthLink')

@section('content')
@include('components.tickets.customer.ticket-info')
@include('components.tickets.customer.create-ticket')
@endsection