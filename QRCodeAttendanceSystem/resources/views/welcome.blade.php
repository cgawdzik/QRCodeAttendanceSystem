<!DOCTYPE html>
<html>
<head>
    <title>Employee Management</title>
</head>
<body>
    <h1>Welcome to the Employee Management System</h1>

    <!-- Form for adding employees -->
    <form action="{{ route('add.employee') }}" method="post">
        @csrf
        <label for="employee_name">Employee Name:</label>
        <input type="text" id="employee_name" name="employee_name">
        <button type="submit">Add Employee</button>
    </form>

    <!-- List of employees with delete buttons -->
    <h2>Employee List:</h2>
    <ul>
        @foreach($employees as $employee)
        <li>
            {{ $employee->employee_name }}
            <form action="{{ route('delete.employee', ['id' => $employee->id]) }}" method="post">
                @csrf
                @method('POST')
                <button type="submit">Delete</button>
            </form>
        </li>
        @endforeach
    </ul>
</body>
</html>
