@extends('layouts.app')

@section('title', 'All Products')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>{{ __('Admins List') }}</h4>
    <a href="{{route("admin.create")}}" class="btn btn-sm btn-primary">
        <i class="fas fa-plus me-1"></i> {{ __('Add Admin') }}
    </a>
</div>
  <x-data-table 
    id="admin-table"
    :ajax-url="route('admin.data')"
    :columns="$columns"
/>

@endsection