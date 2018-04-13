<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';
    protected $primaryKey = 'art_id';

    public $timestamps = false;

    //public $fillable = [];
    //设置$guarded 为空，则所有的属性都可以被批量复制
    public $guarded = [];

}
