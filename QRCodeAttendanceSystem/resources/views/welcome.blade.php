<!DOCTYPE html>
<html>
<head>
    <title>Employee Management</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold mb-8">Welcome to the DM Inc. Employee Management System</h1>

        <!-- Form for adding employees -->
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <form action="{{ route('add.employee') }}" method="post" class="mb-4">
                @csrf
                <div class="mb-4">
                    <label for="employee_name" class="block text-gray-700 text-sm font-bold mb-2">Employee Name:</label>
                    <input type="text" id="employee_name" name="employee_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Add Employee</button>
            </form>
        </div>

        <!-- List of employees with delete buttons -->
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-xl font-bold mb-4">Employee List:</h2>
            <ul>
                @foreach($employees as $employee)
                <li class="mb-4">
                    <div class="flex items-center justify-between">
                        <span class="text-gray-700">{{ $employee->employee_name }}</span>
                        <form action="{{ route('delete.employee', ['id' => $employee->id]) }}" method="post" class="ml-4">
                            @csrf
                            @method('POST')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded focus:outline-none focus:shadow-outline">Delete</button>
                        </form>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html>
