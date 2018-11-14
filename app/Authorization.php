<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Authorization extends Model
{
    protected $fillable = [
        'admin_id',
        'is_super_admin',
        'can_category_news',
        'can_news',
        'can_contact',
        'can_setting',
        'can_question',
        'can_delete_question',
        
    ];

    public $selector = [
        'is_super_admin' => 'Super Admin',
        'can_category_news'   => 'Quản lý danh mục',
        'can_news' => 'Quản lý bài viết', 
        'can_contact' => 'Quản lý liên hệ',
        'can_setting' => 'Quản lý cài đặt',
        'can_question' => 'Quản lý câu hỏi',
        'can_delete_question' => 'Xóa câu hỏi',
    ];

    public function isSuperAdmin()
    {
        return $this->is_super_admin;
    }

    public function canNewsCategory()
    {
    	return $this->can_category_news;
    }
    public function canNews()
    {
    	return $this->can_news;
    }
    public function canContact()
    {
    	return $this->can_contact;
    }
    public function canSetting()
    {
    	return $this->can_setting;
    }
    public function canQuestion()
    {
    	return $this->can_question;
    }
    public function canDeleteQuestion()
    {
    	return $this->can_delete_question;
    }
    
}
