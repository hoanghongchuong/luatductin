<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    public function getFirstQuestion($cate_id)
    {
    	$data = $this->where('cate_id', $cate_id)->orderBy('id','desc')->first();
    	return $data;
    }

    public function member()
    {
    	return $this->hasOne('App\Member','id', 'member_id');
    }
}
