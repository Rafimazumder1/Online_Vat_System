@extends('layout.master')

@section('page-title', 'Welcome')

@section('content')
<form action="{{ route('create.role') }}" method="POST">
    @csrf
    <div class="row mb-3">
        <div class="col-md-10">
            <label for="designation" class="form-label">Designation</label>
            <input type="text" class="form-control" id="designation" name="designation" required>
        </div>
        <div class="col-md-2">
            <label for="roll" class="form-label">Status</label>
            <select class="form-control" id="rollName" name="roll" required>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="text-center">
        <button type="submit" class="btn btn-primary">Create User</button>
    </div>
</form>
@endsection
