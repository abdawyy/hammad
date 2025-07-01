@extends('layouts.app')

@section('title', __('admin.create_admin'))

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">{{ __('admin.create_admin') }}</h2>
<a href="{{ route('admin.index') }}" class="btn btn-secondary">{{ __('admin.return') }}</a>
    </div>

    <form action="{{ route('admin.create.store') }}" method="POST">
        @csrf

        <div class="row mb-3">
            <div class="col-12 col-md-6">
                <label for="name" class="form-label">{{ __('admin.name') }}</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                @error('name') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="col-12 col-md-6">
                <label for="email" class="form-label">{{ __('admin.email') }}</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                @error('email') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12 col-md-6">
                <label for="password" class="form-label">{{ __('admin.password') }}</label>
                <input type="password" name="password" class="form-control" required>
                @error('password') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="col-12 col-md-6">
                <label for="password_confirmation" class="form-label">{{ __('admin.password_confirmation') }}</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-12">
                <label for="role_id" class="form-label">{{ __('admin.role') }}</label>
                <select name="role_id" class="form-control" required>
                    <option value="">{{ __('admin.select_role') }}</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
                @error('role_id') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">{{ __('admin.submit') }}</button>
        </div>
    </form>
</div>
@endsection
