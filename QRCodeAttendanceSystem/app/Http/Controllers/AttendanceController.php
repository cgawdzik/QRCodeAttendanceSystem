<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    /**
     * Handle employee entry.
     *
     * @param Request $request
     * @return Response
     */
    public function entry(Request $request)
    {
        $validated = $request->validate([
            'employee_name' => 'required|string|max:255', // Validate the name
        ]);

        $attendance = new Attendance();
        $attendance->employee_name = $validated['employee_name'];
        $attendance->entry_time = now(); // Sets the current time
        $attendance->save();

        return response()->json(['message' => 'Entry recorded successfully.']);
    }

    /**
     * Handle employee exit.
     *
     * @param Request $request
     * @return Response
     */
    public function exit(Request $request)
    {
        $validated = $request->validate([
            'employee_name' => 'required|string|max:255', // Validate the name
        ]);

        // Find the latest attendance record for the employee
        $attendance = Attendance::where('employee_name', $validated['employee_name'])
                                ->whereDate('entry_time', Carbon::today())
                                ->latest()
                                ->first();

        if ($attendance) {
            $attendance->exit_time = now(); // Sets the current time
            $attendance->save();

            return response()->json(['message' => 'Exit recorded successfully.']);
        }

        return response()->json(['message' => 'No entry record found for today.'], 404);
    }
}
