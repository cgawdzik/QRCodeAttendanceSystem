<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    // Define the fillable properties that can be mass-assigned
    protected $fillable = [
        'user_id',
        'employee_name',
        'entry_time',
        'exit_time'
    ];

    // Link attendance records to users if a User model exists
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
