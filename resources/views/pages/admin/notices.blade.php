@extends('layout.app')

@section('title', 'Manage Notices | EarthLink')

@section('content')
@include('components.notices.notice-list')
@include('components.notices.create-notice')
@include('components.notices.update-notice')
@include('components.notices.delete-notice')
@endsection