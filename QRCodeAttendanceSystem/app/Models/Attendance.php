<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    // Define the fillable properties that can be mass-assigned
    protected $fillable = [
        'user_id',
        'employee_name',
        'entry_time',
        'exit_time'
    ];

    // If you're using user authentication and want to link attendance records to users
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
