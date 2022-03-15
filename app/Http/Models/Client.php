<?php

namespace App\Http\Models;

use App\Abstracts\UnicodeModel;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Client extends UnicodeModel
{
    use HasTranslations;

    public $translatable = [
        'title',
        'summary'

    ];
    protected $table = "clients";
    protected $fillable = [
        'title',
        'image',
        'summary',
        'user_id',
        'trusted_client',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;

}
