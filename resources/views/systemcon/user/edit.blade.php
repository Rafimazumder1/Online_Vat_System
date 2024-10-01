@extends('layout.master')

@section('page-title', 'Welcome')

@section('content')

@section('content')
<form action="{{ route('update.user', $user->apps_user) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="employee_id">Employee ID:</label>
    <input type="text" name="employee_id" value="{{ $user->apps_user }}" required>

    <label for="role">Role:</label>
    <select name="role" required>
        @foreach($roles as $role)
            <option value="{{ $role->desig_code }}" {{ $user->role_id == $role->desig_code ? 'selected' : '' }}>
                {{ $role-> desig_name }}
            </option>
        @endforeach
    </select>

    <label for="password">Password (leave blank if unchanged):</label>
    <input type="password" name="password">

    <label for="password_confirmation">Confirm Password:</label>
    <input type="password" name="password_confirmation">

    <button type="submit">Update User</button>
</form>
@endsection
