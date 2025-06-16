@extends('layouts.app')

@section('title', 'All Products')

@section('content')
  <x-data-table 
    id="admin-table"
    :ajax-url="route('admin.data')"
    :columns="$columns"
/>

@endsection