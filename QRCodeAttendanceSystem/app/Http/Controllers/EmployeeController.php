<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Attendance;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    public function welcome()
    {
        $employees = Employee::all();
        $attendance = now();

        return view('welcome', compact('employees', 'attendance'));
    }

    public function addEmployee(Request $request)
    {
        $request->validate([
            'employee_name' => 'required|string|max:255',
        ]);

        $employee = new Employee();
        $employee->employee_name = $request->input('employee_name'); // Corrected field name
        $employee->save();

        return redirect()->route('welcome')->with('success', 'Employee added successfully');
    }

    public function deleteEmployee($id)
    {
        $employee = Employee::find($id);
        if (!$employee) {
            return redirect()->route('welcome')->with('error', 'Employee not found');
        }

        $employee->delete();

        return redirect()->route('welcome')->with('success', 'Employee deleted successfully');
    }
}
