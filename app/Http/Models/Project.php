<?php

namespace App\Http\Models;

use App\Abstracts\UnicodeModel;
use Illuminate\Database\Eloquent\Model;

class Project extends UnicodeModel
{
    protected $table = "projetcs";
    protected $fillable = [
        'landscape_id',
        'construction_id',
        'road_id',
        'electric_id',
        'user_id',
        'client_id',
        'created_at',
        'updated_at'
    ];


}
