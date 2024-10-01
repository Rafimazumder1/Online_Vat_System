{{-- @extends('layout.master');

@section('page-title', 'Welcome');

@section('content')


    <div class="container-fluid px-4">
        <div class="card">
            <div class="card-header">
                <b style="color:cornflowerblue">Company Information</b>
            </div>
            <div class="card-body">
                <form action="{{ route('create.user') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                     <div class="row mb-3">


                        <div class="col-md-3">
                            <label for="userName" class="form-label">User</label>
                            <select class="form-control" id="userName" name="employee_id" required onchange="updateUserName()">
                                <option value="">Select Employee</option> <!-- Optional default option -->
                                @foreach ($employees as $emp)
                                    <option value="{{ $emp->emp_code }}">{{ $emp->emp_name }}</option> <!-- Display EMP_NAME but use EMP_CODE as value -->
                                @endforeach
                            </select>
                        </div>



                        <div class="col-md-3">
                            <label for="roll" class="form-label">Roll</label>
                            <input type="text" class="form-control" id="rollName" name="roll" required>
                        </div>

                        <div class="col-md-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <div class="col-md-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" required>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Create User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <script>
        function updateUserName() {
            const userNameSelect = document.getElementById('userName');

            // Get the selected option
            const selectedOption = userNameSelect.options[userNameSelect.selectedIndex];

            // Only update if a valid selection is made
            if (selectedOption.value) {
                // Change the displayed text to show only the EMP_CODE
                userNameSelect.options[userNameSelect.selectedIndex].text = selectedOption.value;
            }
        }
    </script>












@endsection --}}




@extends('layout.master')

@section('page-title', 'Welcome')

@section('content')

<div class="container-fluid px-4">
    <div class="card">
        <div class="card-header">
            <b style="color:cornflowerblue">User Information</b>
        </div>
        <div class="card-body">
            <form action="{{ route('create.user') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="userName" class="form-label">User</label>
                        <select class="form-control" id="userName" name="employee_id" required onchange="updateUserName()">
                            <option value="">Select Employee</option> <!-- Optional default option -->
                            @foreach ($employees as $emp)
                                <option value="{{ $emp->emp_code }}">{{ $emp->emp_name }}</option> <!-- Display EMP_NAME but use EMP_CODE as value -->
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-control" id="roleName" name="role" required onchange="updateRoleName()">
                            <option value="">Role</option>
                            @foreach ($designations as $desig)
                            <option value="{{ $desig->desig_code }}">{{ $desig->desig_name }}</option> <!-- Display EMP_NAME but use EMP_CODE as value -->
                        @endforeach
                    </select>
                </div>


                    <div class="col-md-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <div class="col-md-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Create User</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Table for displaying users -->
    <div class="card mt-4">
        <div class="card-header">
            <b style="color:cornflowerblue">User List</b>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>

                        <th>User Name</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $users)
                        <tr>
                            <td>{{ $users->apps_user }}</td>

                            <td>{{ $users->user_role }}</td>
                            <td>
                                <a href="{{ route('edit.user', $users->apps_user) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('delete.user', $users->apps_user) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function updateUserName() {
        const userNameSelect = document.getElementById('userName');

        // Get the selected option
        const selectedOption = userNameSelect.options[userNameSelect.selectedIndex];

        // Only update if a valid selection is made
        if (selectedOption.value) {
            // Change the displayed text to show only the EMP_CODE
            userNameSelect.options[userNameSelect.selectedIndex].text = selectedOption.value;
        }
    }
</script>

@endsection
