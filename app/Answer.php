<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';

    public function admin()
    {
    	return $this->hasOne('App\User','id', 'admin_id');
    }
    public function member()
    {
    	return $this->hasOne('App\Member', 'id','member_id');
    }
}
