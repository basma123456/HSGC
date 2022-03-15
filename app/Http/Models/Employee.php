<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;


class Employee extends Model
{



    protected $table = "employees";
    protected $fillable = [
        'user_name',
        'email',
        'title',
        'phone_number',
        'address',
        'image',
        'summary',
        'resume',
        'user_id ',
        'status',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;

}
