<?php

namespace App\Http\Models;

use App\Abstracts\UnicodeModel;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CarouselAttribute extends UnicodeModel
{

    use HasTranslations;

    public $translatable = [
        'carousel_title',
        'carousel_summary',
        'text1',
        'text2',
        'text3'


    ];

    protected $table = "carousel_attributes";

    protected $fillable = [
        'carousel_id',
        'carousel_title',
        'carousel_image',
        'carousel_summary',
        'user_id',
        'text1',
        'text2',
        'text3',
        'carousel_image2',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;


}
