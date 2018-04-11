<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'cate_id';

    public $timestamps = false;

    //public $fillable = [];
    //设置$guarded 为空，则所有的属性都可以被批量复制
    public $guarded = [];

    public function tree() {

        $list = $this->all();
        return $this->getTree($list,'cate_name','cate_id','cate_pid');
    }

    public function getTree($list,$field_name,$field_id = 'id',$field_pid = 'pid',$root_node = 0) {

        $cate = [];
        foreach ($list as $key=>$value) {
            if ($value[$field_pid] == $root_node) {
                $cate[] = $value;
            }
            foreach ($list as $key2=>$value2) {
                if ($value[$field_id] == $value2[$field_pid]) {
                    $value2[$field_name] = '├──'.$value2[$field_name];
                    $cate[] = $value2;
                }
            }
        }
        return $cate;

    }

}
