<?php

namespace App\Http\Models;

use App\Abstracts\UnicodeModel;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Carousel extends UnicodeModel
{
    use HasTranslations;

    public $translatable = [
        'carousel_name'

    ];

    protected $table = "carousels";

    protected $fillable = [
        'carousel_name',
        'user_id',
        'created_at',
        'updated_at',
    ];
    public $timestamps = true;

}
