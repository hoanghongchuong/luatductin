<?php 
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\NewsLetter;
use DB,Cache,Mail;
use App\News;
use App\Guest;
use App\ProductCate;
use App\NewsCate;
use App\Question;
use App\Member;
use App\Answer;
use App\Setting;
class IndexController extends Controller {
	protected $setting = NULL;

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		
    	$setting = DB::table('setting')->select()->where('id',1)->get()->first();
    	
    	$about = DB::table('about')->where('com','gioi-thieu')->get();
    	Cache::forever('setting', $setting);
       
        Cache::forever('about', $about);
        
        
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{	
		session_start();	
		$tintuc_moinhat = DB::table('news')->select()->where('status',1)->where('com','bai-viet')->orderBy('id','desc')->take(4)->get();

		$com='index';		
		$hot_news = DB::table('news')->where('status',1)->where('noibat',1)->take(8)->orderBy('id','desc')->get();
		$categories = NewsCate::where('parent_id', 0)->where('home', 1)->get();			
		// Cấu hình SEO
		$setting = Cache::get('setting');
		$title = $setting->title;
		$keyword = $setting->keyword;
		$description = $setting->description;
		// End cấu hình SEO
		$img_share = asset('upload/hinhanh/'.$setting->photo);
		//count guest online
		$guest_id = session_id();
		$time = time();
		$time_check = $time-60;
		$resultGuestId = Guest::where('guest_id',$guest_id)->first();
		// dd($guest_id);
		
		if($resultGuestId){
			Guest::where('guest_id', $guest_id)->update(['time' => $time]);
		}else{
			$guest = new Guest;
			$guest->time = $time;
			$guest->guest_id = $guest_id;			
			$guest->save();
			DB::table('setting')->increment('number_view',1);
		}
		
		Guest::where('time', '<', $time_check)->delete();
		return view('templates.index_tpl', compact('title', 'description', 'keyword', 'setting', 'about','hot_news','tintuc_moinhat','categories','com'));
	}
	
	public function getAbout()
	{
		$about = DB::table('about')->where('com','gioi-thieu')->first();
        $com = 'gioi-thieu';		
		 //Cấu hình SEO
		if(!empty($about->title)){
			$title = $about->title;
		}else{
			$title = $about->name;
		}
		$keyword = $about->keyword;
		$description = $about->description;
		// End cấu hình SEO

		return view('templates.about_tpl', compact('about','slider_about','banner_danhmuc','keyword','description','title','img_share','com'));
	}
	

	public function getNews()
	{
		$cateNews = DB::table('news_categories')->where('com','tin-tuc')->get();		
		$tintuc = DB::table('news')->select()->where('status',1)->where('com','tin-tuc')->orderby('id','desc')->paginate(6);
		$hot_news = DB::table('news')->where('status',1)->where('com', 'tin-tuc')->where('noibat',1)->orderBy('created_at','desc')->take(6)->get();
		
		$com='tin-tuc';
		// Cấu hình SEO
		$title = "Tin tức";
		$keyword = "Tin tức";
		$description = "Tin tức";
		$img_share = '';
		// End cấu hình SEO
		return view('templates.news_tpl', compact('tintuc','banner_danhmuc','tintuc_noibat','camnhan_khachhang','keyword','description','title','img_share','com','cateNews','cate_pro','products','hot_news'));
	}
	public function getListNews($alias)
	{		
		$tintuc_cate = NewsCate::where('status',1)
			->where('com','bai-viet')
			->where('alias',$alias)
			->first();
		$cateNews = DB::table('news_categories')->where('com','tin-tuc')->get();
		if(!empty($tintuc_cate)){
			// $ids =[];
			// $ids[] = $tintuc_cate->id;
			// $cateChilds = DB::table('news_categories')->where('parent_id', $tintuc_cate->id)->get();
			// foreach($cateChilds as $child){
			// 	$ids[] = $child->id;
			// } 
			// $news = News::where('status',1)->whereIn('cate_id', $ids)->orderBy('id','desc')->paginate(10);
			$news = $tintuc_cate->news;
			$hot_news = DB::table('news')->where('noibat',1)->where('status',1)->take(20)->orderBy('id','desc')->get();
			if(!empty($tintuc_cate->title)){
				$title = $tintuc_cate->title;
			}else{
				$title = $tintuc_cate->name;
			}
			$keyword = $tintuc_cate->keyword;
			$description = $tintuc_cate->description;
			$img_share = asset('upload/news/'.$tintuc_cate->photo);

			// End cấu hình SEO
			return view('templates.news_list', compact('tintuc','tintuc_cate','banner_danhmuc','keyword','description','title','img_share','news', 'cateNews','hot_news'));
		}else{
			return redirect()->route('getErrorNotFount');
		}
	}
	
	public function getNewsDetail($alias)
	{

		$news_detail = DB::table('news')->select()->where('status',1)->where('com','bai-viet')->where('alias',$alias)->first();
		$news_cate = DB::table('news_categories')->where('id', $news_detail->cate_id)->first();
		$cateNews = DB::table('news_categories')->where('com','tin-tuc')->get();
		if(!empty($news_detail)){			
			$com='tin-tuc';
			$setting = Cache::get('setting');
			$news_same_cate = News::where('cate_id', $news_detail->cate_id)->where('id','<>',$news_detail->id)->take(3)->orderBy('id','desc')->get();

			// Cấu hình SEO
			if(!empty($news_detail->title)){
				$title = $news_detail->title;
			}else{
				$title = $news_detail->name;
			}
			$keyword = $news_detail->keyword;
			$description = $news_detail->description;
			$img_share = asset('upload/news/'.$news_detail->photo);

			return view('templates.news_detail_tpl', compact('news_detail','com','cateNews','keyword','description','title','img_share','hot_news','news_same_cate','cate_pro','news_cate'));
		}else{
			return redirect()->route('getErrorNotFount');
		}
		
	}
	
	public function getErrorNotFount(){
		$banner_danhmuc = DB::table('lienket')->select()->where('status',1)->where('com','chuyen-muc')->where('link','san-pham')->get()->first();
		return view('templates.404_tpl',compact('banner_danhmuc'));
	}

	
    public function loadDistrictByProvince($id){
    	$district = District::where('province_id',$id)->get();
    	// dd($district);
    	foreach($district as $item){
    		echo "<option value='".$item->id."'>".$item->district_name."</option>";
    	}
    }
    
	public function getDichvu()
	{
		$tintuc = DB::table('news')->select()->where('status',1)->where('com','dich-vu')->orderby('id','desc')->paginate(5);
		$hot_news = DB::table('news')->where('status',1)->where('com', 'tin-tuc')->where('noibat',1)->orderBy('created_at','desc')->take(6)->get();
		
		$com='dich-vu';
		// Cấu hình SEO
		$title = "Dịch vụ";
		return view('templates.dichvu', compact('tintuc','hot_news','com','title'));
	}
	public function getDichVuDetail($id)
	{

		$news_detail = DB::table('news')->select()->where('status',1)->where('com','dich-vu')->where('alias',$id)->get()->first();
		if(!empty($news_detail)){
			
			
			$tinkhac = DB::table('news')->where('status',1)->where('id','<>',$id)->take(7)->get();
			$hot_news = DB::table('news')->where('status',1)->where('com', 'dich-vu')->orderBy('created_at','desc')->take(5)->get();
			
			$com='tin-tuc';
			$setting = Cache::get('setting');
			// Cấu hình SEO
			if(!empty($news_detail->title)){
				$title = $news_detail->title;
			}else{
				$title = $news_detail->name;
			}
			$keyword = $news_detail->keyword;
			$description = $news_detail->description;
			$img_share = asset('upload/news/'.$news_detail->photo);

			return view('templates.dichvudetail', compact('news_detail','com','keyword','description','title','img_share','hot_news','tinkhac'));
		}else{
			return redirect()->route('getErrorNotFount');
		}
	}

	public function hoidap()
	{
		$categories = ProductCate::all();
		$title = 'Hỏi đáp';
		$com='hoi-dap';
		return view('templates.hoidap', compact('categories','title','com'));
	}
	public function listCate($cate)
	{
		$cateQuestion = ProductCate::select('id')->where('alias', $cate)->first();
		$questions = Question::where('cate_id', $cateQuestion->id)->orderBy('id','desc')->paginate(10);
		// dd($questions);
		return view('templates.list_hoidap', compact('questions'));
	}
	public function detailQuestion($alias)
	{
		$data = Question::where('alias', $alias)->first();
		$answers = Answer::where('question_id', $data->id)->where('status',1)->orderBy('id','asc')->get();
				
		$title = $data->name;
		return view('templates.detail_question', compact('data','title', 'answers'));
	}

	public function getQuestsion()
	{
		$categories = ProductCate::all();
		return view('templates.datcauhoi', compact('categories'));
	}
	public function postQuestsion(Request $req)
	{
		$this->validate($req, 
			[
				'name' => 'required',
				'content' => 'required',
				'cate_id' => 'required',
			],
			[
				'name.required' => 'Chưa nhập tiêu đề câu hỏi',
				'content.required' => 'Chưa nhập nội dung',
				'cate_id.required' => 'Chưa chọn chủ đề'
			]
			);
		$data = new Question;
		
		if(Auth::guard('member')->check()){
			$data->name = $req->name;
			$data->content = $req->content;
			$data->cate_id = $req->cate_id;
			$data->alias = str_slug($req->name);
			$data->member_id = Auth::guard('member')->user()->id;
			$data->status = 0;
			$data->save();
			return back()->with('message','Gửi câu hỏi thành công');
		}
		else{
			return back()->with('message','Bạn chưa đăng nhập');
		}		
	}

	public function postAnswer(Request $req)
	{
		if(Auth::guard('member')->check()){
			$data = new Answer;
			$data->content = $req->content;
			$data->question_id = $req->question_id;
			$data->member_id = Auth::guard('member')->user()->id;
			if($data->content !=''){
				$data->save();
				return back()->with([
					'toastr_lvl' => 'success',
					'toastr_msg' => 'Gửi thành công !'
				]);
			}
			else{
				return back()->with([
					'toastr_lvl' => 'error',
					'toastr_msg' => 'Chưa nhập nội dung câu trả lời !'
				]);
			}
			
		}
	}

	public function search(Request $request) {
		$search = $request->txtSearch;
		$hot_news = DB::table('news')->where('noibat',1)->where('status',1)->take(20)->orderBy('id','desc')->get();
		$title = "Tìm kiếm: " . $search;

		$description = "Tìm kiếm: " . $search;
		$img_share = '';
		$com = 'search';
		$data = DB::table('news')->where('name', 'LIKE', '%' . $search . '%')->orderBy('id', 'DESC')->paginate(20);
		// dd($data);
		return view('templates.search_tpl', compact('data','hot_news', 'description', 'title', 'img_share', 'search', 'com'));
	}
	public function searchQuestion(Request $req)
	{
		$search = $req->search_question;
		$data = Question::where('name','LIKE', '%' . $search . '%')->orderBy('id','desc')->get();
		return view('templates.search_question', compact('data'));
	}
}
