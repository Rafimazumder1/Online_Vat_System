
<!DOCTYPE html>
<html>
<head>
    <title>Create User</title>
</head>
<body>

    <form action="{{ route('create.user') }}" method="POST">
        @csrf
        <label for="employee_id">Employee ID:</label>
        <select name="employee_id" id="employee_id" required>
            @foreach($employees as $employee)
                <option value="{{ $employee->emp_code }}">{{ $employee->emp_name }}</option>
            @endforeach
        </select><br><br>

        <label for="roll">Role:</label>
        <input type="text" name="roll" id="roll" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>

        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required><br><br>

        <button type="submit">Create User</button>
    </form>
</body>
</html>
