<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestDetail extends Model
{
    use HasFactory;

    protected $table="test_details";

    protected $fillable=[
        'name',
        'user_id',
        'date',
        'test',
        'status',
        'lab_name',
    ];

}
