<?php

namespace App\Http\Models;

namespace App\Http\Models;

use App\Abstracts\UnicodeModel;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Manager extends UnicodeModel
{
    use HasTranslations;

    public $translatable = [
        'name',
        'title',
        'summary'

    ];
    protected $table = "managers";

    protected $fillable = [
        'name',
        'title',
        'summary',
        'user_id '

    ];


    public $timestamps = true;

}
