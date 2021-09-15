<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;

    const courses = [
        'Bsc Software Engineering',
        'Bsc Computer Science',
        'Bsc Education Sciences',
        'Bsc Business Studies',
        'Bsc Information Technology',
    ];

    const status = [
        'Banned',
        'Active',
    ];

    protected $fillable = [
        'user_id',
        'phone',
        'status',
        'course',
        'reg_no',
    ];
}
