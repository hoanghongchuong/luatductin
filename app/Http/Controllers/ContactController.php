<?php 
namespace App\Http\Controllers;
use App\Contact;
use App\Answer;
use App\Question;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request as Requests;
use DB,Cache,Mail, Request;
class ContactController extends Controller {
	protected $setting = NULL;

	public function __construct()
	{
		
    	$setting = DB::table('setting')->select()->where('id',1)->get()->first();
        Cache::forever('setting', $setting);
	}

	public function getContact()
    {
    	$data = DB::table('about')->where('com','lien-he')->first();
        // Cấu hình SEO
		$title = "Liên hệ";
		$keyword = "Liên hệ";
		$description = "Liên hệ";
		$img_share = '';
		$com='lien-he';
		
		// End cấu hình SEO
        return view('templates.contact_tpl', compact('data','lien-he','keyword','description','title','com'));
    }

    /**
     * post contact action
     * @param  Request $request
     * @return redirect
     */
    public function postContact(Requests $request)
	{
		$data = new Contact();
		$data->name = $request->name;
		$data->phone = $request->phone;
		$data->address = $request->address;
		$data->email = $request->email;
		$data->content = $request->content;
		$value = [
                'hoten' => Request::input('name'),
                'dienthoai' => Request::input('phone'),
                'email' => Request::input('email'),                
                'noidung' => Request::input('content')
            ];
            Mail::send('templates.sendmail', $value, function ($msg) {
                $setting = Cache::get('setting');
                $msg->from(Request::input('email'),  $setting->name);
                $msg->to($setting->email, 'Admin')->subject('Ity.vn thông báo');
                // $msg->to(Request::input('email'), Request::input('full_name'))->subject('Đơn đặt hàng');
            });

		$data->save();		
		echo "<script type='text/javascript'>
			alert('Cảm ơn bạn đã gửi liên hệ. Chúng tôi sẽ liên hệ lại với bạn sớm nhất !');
			window.location = '".url('/')."' </script>";
	}

	public function postQuestsion(Requests $req)
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
			$member = DB::table('members')->select('name')->where('id',$data->member_id)->first();
			$value = [
                'member' => $member->name,
                
            ];
            Mail::send('templates.sendmail_question', $value, function ($msg) {
                $setting = Cache::get('setting');
                $msg->from($setting->email,  'Hệ thống website http://luatsu.hanoi.vn/');
                $msg->to($setting->email, 'Admin')->subject('Hệ thống website http://luatsu.hanoi.vn/ thông báo');
                // $msg->to(Request::input('email'), Request::input('full_name'))->subject('Đơn đặt hàng');
            });
			$data->save();
			return back()->with('message','Gửi câu hỏi thành công');
		}
		else{
			return back()->with('message','Bạn chưa đăng nhập');
		}		
	}

	public function postAnswer(Requests $req)
	{
		if(Auth::guard('member')->check()){
			$data = new Answer;
			$data->content = $req->content;
			$data->question_id = $req->question_id;
			$data->member_id = Auth::guard('member')->user()->id;
			$member = DB::table('members')->select('name')->where('id',$data->member_id)->first();
			$question = DB::table('questions')->select('name')->where('id', $data->question_id)->first();
			if($data->content !=''){
				$value = [
	                'hoten' => $member->name,
	                'question' => $question->name,               	             
	                // 'noidung' => Request::input('content')
	            ];
	            Mail::send('templates.sendmail_answer', $value, function ($msg) {
	                $setting = Cache::get('setting');
	                $msg->from($setting->email, 'Hệ thống website http://luatsu.hanoi.vn/');
	                $msg->to($setting->email, 'Admin')->subject('Hệ thống thông báo');
	                // $msg->to(Request::input('email'), Request::input('full_name'))->subject('Đơn đặt hàng');
	            });
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
}
