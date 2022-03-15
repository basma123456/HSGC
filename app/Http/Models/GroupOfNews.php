<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Abstracts\UnicodeModel;
use Spatie\Translatable\HasTranslations;

class GroupOfNews extends UnicodeModel
{
    use HasTranslations;

    public $translatable = [
        'title'

    ];
    protected $table = "group_of_news";
    protected $fillable = [
        'title'
    ];


    public $timestamps = true;

    public function newss() {
        return $this->hasMany(News::class,'group_of_news_id' , 'id');
    }

}
