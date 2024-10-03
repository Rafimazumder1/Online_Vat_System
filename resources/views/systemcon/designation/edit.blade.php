@extends('layout.master')

@section('content')
<h3>Edit Designation</h3>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<form action="{{ route('designation.update', $designation->desig_code) }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="designation" class="form-label">Designation Name</label>
        <input type="text" class="form-control" id="designation" name="designation" value="{{ $designation->desig_name }}" required>
    </div>

    <div class="mb-3">
        <label for="roll" class="form-label">Status</label>
        <select class="form-control" id="roll" name="roll" required>
            <option value="active" {{ $designation->status === 'A' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ $designation->status === 'I' ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update Designation</button>
</form>
@endsection
