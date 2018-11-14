<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Users;
use App\Authorization;
use App\Images;
use Input, File;
use Validator;
use Auth;
use DB,Hash;

class UsersController extends Controller
{
    public function __construct(Users $user, Authorization $authorization)
    {
        $this->Users = $user;
        $this->Authorization = $authorization;
    }

    public function list()
    {
        $data = $this->Users->getList();
        return view('admin.users.list', compact('data'));
    }
    public function index()
    {
        $data = DB::table('user')->select()->first();
        
        return view('admin.users.edit', compact('data'));
    }
    public function getAdmin()
    {
        $id_user=Auth::user()->id;
        $data = DB::table('users')->select()->where('id', $id_user)->get()->first();
        
        return view('admin.users.admin', compact('data'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function updateinfo(Request $request)
    {
        $this->validate($request,
            [
                "txtName" => "required",
                "txtPassword" => "required",
                //'txtPasswordNew' => 'min:8|confirmed'
            ],
            [
                "txtName.required" => "Bạn chưa nhập tên",
                //"txtPasswordNew.length" => "Mật khẩu ít nhất 8 ký tự",
                "txtPassword.required" => "Bạn chưa nhập lại mật khẩu"
            ]
        );
        $id_user = Auth::user()->id;
        //$user = DB::table('users')->select('id',$id_user)->first();

        $data = Users::find($id_user);
        if(!empty($data)){
            $img = $request->file('fImages');

            if(!empty($img)){
                $path_img='upload/users';
                $img_name=$img->getClientOriginalName();
                $img->move($path_img,$img_name);
                $data->photo = $img_name;
            }
            $data->name = $request->txtName;
            if(!empty($request->txtPasswordNew)){
                $data->password = Hash::make($request->txtPasswordNew);
            }
            
            $data->address = $request->txtAddress;
            $data->phone = $request->txtPhone;
            $data->email = $request->txtEmail;
            // if($request->status=='on'){
            //     $product->status = 1;
            // }else{
            //     $product->status = 0;
            // }
            $data->save();

            return redirect('backend/users/info')->with('status','Cập nhật thành công');
        }else{
            return redirect('backend')->with('status','Cập nhật dữ liệu lỗi');
        }
    }


    public function create(Request $req, $id = null)
    {
        $authSelector = $this->Authorization->selector;
        // dd($authSelector);
        if($req->isMethod('GET')){
            if($id){
                $admin = $this->Users->findOrFail($id);
            }            
            return view('admin.users.create', compact('admin','authSelector'));

        }   
        $this->validate($req,
            [
                'name' => 'required',
                'username' => 'required|unique:users,username' . ($id ? ',' . $id : ''),                
                'password' => ($id ? 'nullable' : 'required').'|min:6', 
                'photo'        => 'nullable|image|max:2048',               
            ],
            [
                'name.required' => 'chưa nhập họ tên',
                'username.required' => 'chưa nhập tên đăng nhập',
                'username.unique' => 'Tên đăng nhập đã tồn tại',
                'password.required' => 'chưa nhập mật khẩu',
                'photo.max'        => 'Dung lượng ảnh không vượt quá 2MB',
                'password.min' => 'Mật khẩu phải có độ dài từ 6 ký tự'
            ]
        );
        $data = $req->only($this->Users->getFieldList());        
        if($req->password){            
            $data['password'] = \Hash::make($data['password']);
        }else{
            unset($data['password']);
        }
        if ($req->hasFile('photo')) {
            $image          = $req->file('photo');
            $data['photo'] = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/admins'), $data['photo']);
            $data['photo'] = 'public/uploads/admins/' . $data['photo'];
        }
        // $data['active']  = isset($data['active']) ? true :false;

        try {
            DB::beginTransaction();
            if($id){
                $this->Users->updateOrCreate(['id' => $id], $data);
            }else {
                $data['created_at'] = date('Y-m-d H:i:s');
                $data['updated_at'] = date('Y-m-d H:i:s');
                $id = $this->Users->insertGetId($data);
            }
            $authData['user_id'] = $id;
            foreach ($req->authorization as $field) {
                $authData[$field] = 1;
            }
            foreach ($authSelector as $field => $text) {
                if (!isset($authData[$field])) {
                    $authData[$field] = 0;
                }
            }
            $this->Authorization->updateOrCreate(['user_id' => $id], $authData);
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('message', 'Lỗi hệ thống');
        }
        $this->Users->updateOrCreate(['id' => $id], $data);

        return redirect()->route('admin.list')->with('message','Thêm thành công');
        
    }

    public function delete($id)
    {
        $data = $this->Users->find($id);
        $data->delete();
        return back()->with('status','Xóa thành công');
    }
}
