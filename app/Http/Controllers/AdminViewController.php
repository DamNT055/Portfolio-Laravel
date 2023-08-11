<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Str;


class AdminViewController extends Controller
{
    public function login() {
        return view('admin.login');
    }
    public function dashboard() {
        return view('admin.dashboard');
    }
    public function blog() {
        return view('admin.blog');
    }
    public function create_blog() {
        return view('admin.create_blog');
    }
    public function edit($id = 0)
    {
        $id = intval($id);
        $data = DB::table('tb_post')->where('id', $id)->first();
        if (empty($data)) return view('admin.404');
        return view('admin.edit_blog')->with('data', $data);
    }
    public function introduction()
    {
        $data = DB::table('tb_json')->where('key', 'introduction')->first();
        $data = json_decode($data->value)[0];
        return view('admin.introduction')->with('data', $data);
    }
    public function doing()
    {
        return view('admin.doing');
    }
    public function testimonial() {
        return view('admin.404');
    }
    public function education() {
        return view('admin.404');
    }
    public function experience() {
        return view('admin.404');
    }
    public function skill() {
        return view('admin.404');
    }
}
