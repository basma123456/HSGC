<?php

namespace App\Http\Models;

use App\Abstracts\UnicodeModel;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Landscape extends UnicodeModel
{
    use HasTranslations;

    public $translatable = [
        'title',
        'summary'

    ];

    protected $table = "landscapes";
    protected $fillable = [
        'title',
        'image',
        'summary',
        'user_id',
        'client_id',
        'status',
        'at_front_page',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;

}
