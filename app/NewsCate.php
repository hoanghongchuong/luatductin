<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsCate extends Model {

	protected $table='news_categories';

	protected $fillable = ['id','name','alias','photo','mota','parent_id','stt','status','title','keyword','description'];

	public $timestamps = true;

	public function cateChilds()
	{
		return $this->hasMany('App\NewsCate', 'parent_id');
	}

	public function getNewsAttribute()
    {
    	$categoryIdArray = $this->getChildCategories([$this->id]);
        return \App\News::whereIn('cate_id', $categoryIdArray)->paginate(10);
    }

    protected function getChildCategories($categoryArray = [])
    {
    	$childIdArray = NewsCate::select('id')->whereIn('parent_id', $categoryArray)->whereNotIn('id', $categoryArray)->get()->pluck('id')->toArray();
    	if (!count($childIdArray)) {
    		return $categoryArray;
    	}
    	$categoryArray = array_merge($categoryArray, $childIdArray);
    	return $this->getChildCategories($categoryArray);
    }
}
