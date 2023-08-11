<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;


class WebsiteController extends Controller
{
    public function index()
    {
        return view('website.about')->with('active', 0);
    }
    public function resume() {
        return view('website.resume')->with('active', 1);
    }
    public function blog()
    {
        $data = DB::table('tb_post')->get();
        return view('website.blog')->with(['active' => 3, 'data' => $data]);
    }
    public function blog_detail($slug = "")
    {
        $slug = trim(strval($slug));
        if (empty($slug)) return abort(404);
        $data = DB::table('tb_post')->where('slug', $slug)->first();
        if (empty($data)) return abort(404);
        return view('website.blog_detail')->with(['active' => 3, 'data' => $data]);
    }
    public function contact() {
        return view('website.contact')->with('active', 4);
    }

    public function create_contact(Request $request)
    {
        $data = array(
            'name' => $request->nameContact,
            'email' => $request->emailContact,
            'message' => $request->messageContact,
            'created_at' => Carbon::now()
        );
        $id = DB::table('tb_contact')->insertGetId($data);
        if (!$id) return showMes(true, 'Data Error');
        return showMes(false, 'Contact Sent Successfully
        ', $id);
    }
}
