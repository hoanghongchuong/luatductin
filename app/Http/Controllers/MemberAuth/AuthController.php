<?php
namespace App\Http\Controllers\MemberAuth;

use App\Http\Requests\MemberRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Member;
use Input, File;
use Validator;
use Auth;
use DB,Hash;
/**
 * 
 */
class AuthController extends Controller
{
    use AuthenticatesUsers;

	protected $guard;
	function __construct(Member $member)
	{
		$this->guard = Auth::guard('member');
        $this->Member = $member;
	}

	public function getLogin()
    {
    	
    	return view('templates.login');
    }

    public function getRegister()
    {
    	return view('templates.register');
    }

    public function postRegister(Request $req)
    {
    	$this->validate($req, 
    		[
    			'name' => 'required',
    			'username' => 'required|unique:members',
    			'password' => 'required|min:6',
    			'email' => 'required|unique:members',
    			'phone' => 'required',
    			'address' => 'required'
	    	],
	    	[
	    		'name.required' => 'Chưa điền họ tên',
	    		'username.required' => 'Chưa điền tên đăng nhập',
	    		'username.unique' => 'Tên đăng nhập đã được đăng ký',
	    		'password.required' => 'Chưa điền mật khẩu',
	    		'password.min' => 'Mật khẩu phải có độ dài từ 6 kí tự',
	    		'email.required' => 'Chưa điền email',
	    		'email.unique' => 'Email đã được đăng kí',
	    		'phone.required' => 'Chưa điền số điện thoại',
	    		'address.required' => 'Chưa điền địa chỉ'
	    	]
    	);
    	$data = $req->only($this->Member->getFieldList());
        if($req->hasFile('avartar_member')){
            $image          = $req->file('avartar_member');
            $path_img='upload/users/';
            $data['photo'] = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path_img, $data['photo']);
            $data['photo'] = 'upload/users/' . $data['photo'];
        }
    	if($req->password){            
            $data['password'] = \Hash::make($data['password']);
        }
        // dd($data);
    	$this->Member->create($data);
    	return back()->with('message', 'Đăng ký thành công');
    }

    public function login(Request $req)
    {
        $auth = [
            'username' => $req->username,
            'password' => $req->password,
            // 'active' => Admin::ACTIVE,
        ];
        // dd($this->guard);
        $remember = $req->remember ? true : false;
        if($this->guard->attempt($auth, $remember)){
            return redirect()->back()->with([
                    'toastr_lvl' => 'success',
                    'toastr_msg' => 'Đăng nhập thành công !'
                ]);
            
            // return 'Đăng nhập thành công';            
        }else{
           return redirect()->back()->with([
                'toastr_lvl' => 'error',
                'toastr_msg' => 'Sai tên đăng nhập hoặc mật khẩu !'
            ]);
        }
    }

    public function logout()
    {
        $this->guard->logout();
        return redirect()->back()->with('info','Đăng xuất thành công');
    }

}
