<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Member extends Authenticatable
{
    protected $table = 'members';

    protected $fillable = [
    	'name','username','password','email','phone','address','photo'
    ];

    public function getFieldList()
    {
    	return $this->fillable;
    }
}
