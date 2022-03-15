<?php

namespace App\Http\Models;

use App\Abstracts\UnicodeModel;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Footer extends UnicodeModel
{

    use HasTranslations;

    public $translatable = [


        'company_address',
        'summary'

    ];

    protected $table = "footer";
    protected $fillable = [
        'summary',
        'company_email',
        'company_phone',
        'company_address',
        'facebook_link',
        'instagram_link',
        'twitter_link',
        'user_id',
        'created_at',
        'updated_at'
    ];

}
