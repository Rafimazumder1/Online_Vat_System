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

<!-- Table for Displaying Roles -->
<div class="mt-4">
    <h3>Role List</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Sl</th>
                <th>Designation</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($designations as $role)
            <tr>
                <td>{{ $role->desig_code}}</td>
                <td>{{ $role->desig_name }}</td>
                <td>{{ $role->status }}</td>
                <td>
                    <a href="{{ route('designation.edit', $role->desig_code) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('role.destroy', $role->desig_code) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this designation?');">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
