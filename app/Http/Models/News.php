<?php

namespace App\Http\Models;

use App\Abstracts\UnicodeModel;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class News extends UnicodeModel
{
    use HasTranslations;

    public $translatable = [
        'title',
        'summary'

    ];
    protected $table = "news";
    protected $fillable = [
        'title',
        'summary',
        'image',
        'group_of_news_id',
        'user_id ',
        'created_at',
        'updated_at'
    ];


    public $timestamps = true;


    public function groups() {
        return $this->belongsTo(GroupOfNews::class,'group_of_news_id', 'id');
    }

}
