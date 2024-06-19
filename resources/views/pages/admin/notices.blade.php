@extends('layout.app')

@section('title', 'Manage Notices | EarthLink')

@section('content')
@include('components.notices.admin.notice-list')
@include('components.notices.admin.create-notice')
@include('components.notices.admin.update-notice')
@include('components.notices.admin.delete-notice')
@endsection