<?php

namespace App\Http\Models;

use App\Abstracts\UnicodeModel;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;



class AboutCompany extends UnicodeModel
{
    use HasTranslations;

    public $translatable = [
        'about_company_summary',
        'our_vision_summary',
        'behind_hsgc_summary',
        'work_with_us_summary'

        ];


    protected  $table = "about_company";
    protected $fillable = [
        'about_company_summary',
        'left_first_image',
        'left_second_image',
        'our_vision_image',
        'our_vision_summary',
        'behind_hsgc_summary',
        'work_with_us_summary',
        'user_id',
        'created_at',
        'updated_at'
    ];

    public $timestamps = true;

}
