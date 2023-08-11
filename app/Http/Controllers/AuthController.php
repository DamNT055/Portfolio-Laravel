<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function __construct()
    {
        $flag = (object) array(
            'status' => false,
            'msg' => false,
            'data' => false,
        );
    }
    public function login(Request $request)
    {   
        $username = $request->username;
        $password = md5($request->password);
        DB::enableQueryLog();
        $dataUser = DB::table('tb_user')->where([['username', '=', $username], ['password', '=', $password]])->first();
        $query = DB::getQueryLog();
        if ($dataUser) {
            Session::put('admin_id', $dataUser->id);
            Session::put('admin_username', $dataUser->username);
            return showMes(false, 'Đăng nhập thành công', '/td-admin');
        }
        return showMes(true, "Vui lòng nhập lại tài khoản hoặc mật khẩu");
    }
    public function logout()
    {

        Session::forget('admin_id');
        Session::forget('admin_username');
        return Redirect::to('/td-admin/login');
    }
}
