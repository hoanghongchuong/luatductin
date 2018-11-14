<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    /**
     * define guard
     * @var object
     */
    protected $guard;
    /**
     * constructor
     */
    public function __construct(Admin $admin)
    {
        $this->guard = Auth::guard('admin');
        $this->Admin = $admin;
    }

    public function getLogin()
    {
    	
    	return view('admin.auth.login');
    }

    public function postLogin(Request $req)
    {
    	$this->validate($req,
    		[                
                'username' => 'required',                
                'password' => 'required'                
            ],
            [                
                'username.required'  => 'Chưa nhập tên đăng nhập',               
                'password.required'  => 'Chưa nhập mật khẩu',                
            ]
    	);

    	// Attempt login
    	$auth = [
    		'username' => $req->username,
    		'password' => $req->password,
    		'active' => Admin::ACTIVE,
    	];
    	$remember = $req->remember ? true : false;
    	if($this->guard->attempt($auth, $remember)){
    		
    		return redirect()->route('admin.index')->with('message', 'Đăng nhập thành công');
    		// return 'Đăng nhập thành công';
    		
    	}else{
    		return redirect()->back()->with('message','Sai tên đăng nhập, mật khẩu, hoặc tài khoản chưa được cho kích hoạt.');
    	}
    }

    public function profile(Request $req)
    {
        $admin = $this->guard->user();

        if($req->isMethod('GET')){
            return view('admin.auth.profile', compact('admin'));
        }
        $this->validate($req, 
            [
                'password' => 'nullable|min:6',
                'username' => ($admin ? 'nullable' : 'required'),
                // 'name'     => 'required',
                'avatar'   => 'nullable|image|max:2048',
            ],
            [
                'password.min' => 'Mật khẩu có độ dài tối thiểu 6 ký tự',
                // 'username.required' => 'Chưa nhập tài khoản đăng nhập',
                // 'name.required' => 'Chưa nhập họ tên',
                'avatar.max' => 'Dung lượng ảnh không vượt quá 2MB'
            ]
        );
        $data = $req->only(['name','password','avatar','username']);
        if($req->password){
            $data['password'] = \Hash::make($data['password']);
        }else{
            unset($data['password']);
        }
        if($req->username){
            $data['username'] = $data['username'];
        }else{
            unset($data['username']);
        }
        if ($req->hasFile('avatar')) {
            $image          = $req->file('avatar');
            $data['avatar'] = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/admins'), $data['avatar']);
            $data['avatar'] = 'public/uploads/admins/' . $data['avatar'];
        } else {
            unset($data['avatar']);
        }
        
        // dd($data);
        $this->guard->user()->update($data);
        return redirect()->back()->with('message', 'Cập nhật thành công');
    }

    /**
     * logout action
     * @return redirect
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.auth.getLogin');
    }
}
