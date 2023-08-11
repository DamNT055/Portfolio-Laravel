<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Str;



class AdminController extends Controller
{

    
    public function create_post(Request $request)
    {
        $file = $request->img_file;
        $file = preg_replace('#^data:image/\w+;base64,#i', '', $file);
        $name = md5(time() . uniqid(rand()));
        $img_upload = Image::make($file);
        $img_upload->save(public_path('images') . '/' . $name . ".jpg");
        $img_upload->resize(400, 720, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $img_upload->save(public_path('images/thumbnail') . '/' . $name . "_thumb.jpg");
        $data = array(
            'title' => $request->title,
            'slug' => Str::slug($request->slug),
            'description' => $request->description,
            'content' => $request->content,
            'cover_img' => $name . "_thumb.jpg",
            'created_at' => Carbon::now()
        );
        $id = DB::table('tb_post')->insertGetId($data);
        if (!$id) return showMes(true, 'Lỗi dữ liệu');
        return showMes(false, 'Thành công', $id);
    }
    public function edit_post(Request $request, $id = 0)
    {
        $id = intval($id);
        $dataEm = DB::table('tb_post')->where('id', $id)->first();
        if (empty($dataEm)) return showMes(true, 'ID không tồn tại');
        $data = array();
        $file = $request->img_file;
        if (!empty($file)) {
            $file = preg_replace('#^data:image/\w+;base64,#i', '', $file);
            $name = md5(time() . uniqid(rand()));
            $img_upload = Image::make($file);
            $img_upload->save(public_path('images') . '/' . $name . ".jpg");
            $img_upload->resize(400, 720, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img_upload->save(public_path('images/thumbnail') . '/' . $name . "_thumb.jpg");
            @unlink(public_path('images/thumbnail') . '/' . $dataEm->cover_img);
            @unlink(public_path('images') . '/' . str_replace('_thumb', '', $dataEm->cover_img));
            $data['cover_img'] =  $name . "_thumb.jpg";
        }
        $data['title'] = $request->title;
        $data['slug'] = $request->slug;
        $data['description'] = $request->description;
        $data['content'] = $request->content;
        $data['updated_at'] = Carbon::now();
        DB::table('tb_post')
            ->where('id', $id)
            ->update($data);
        return showMes(false, 'Thành công');
    }
    public function get_all()
    {
        $data = DB::table('tb_post')->orderBy('id', 'DESC')->get();
        $json = (object) ['data' => $data];
        echo json_encode($json, JSON_PRETTY_PRINT);
    }
    public function delete_post($id = 0)
    {
        $id = intval($id);
        $dataEm = DB::table('tb_post')->where('id', $id)->first();
        if (empty($id) || empty($dataEm)) return showMes(true, 'ID không đúng');
        DB::table('tb_post')->delete($id);
        @unlink(public_path('images/thumbnail') . '/' . $dataEm->cover_img);
        @unlink(public_path('images') . '/' . str_replace('_thumb', '', $dataEm->cover_img));
        return showMes(false, 'Xóa thành công');
    }
    public function change_introduction(Request $request)
    {
        $content = $request->content;
        $json = (object) [
            'content' => $content,
        ];
        DB::table('tb_json')
            ->where('key', 'introduction')
            ->update(['value' => json_encode([$json]), 'updated_at' => Carbon::now()]);
        return showMes(false, 'Thành công');
    }
    public function save_doing(Request $request)
    {
        $file = $request->img_file;
        $file = preg_replace('#^data:image/\w+;base64,#i', '', $file);
        $name = md5(time() . uniqid(rand()));
        $img_upload = Image::make($file);
        $img_upload->save(public_path('images') . '/' . $name . ".jpg");
        $img_upload->resize(400, 720, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $img_upload->save(public_path('images/thumbnail') . '/' . $name . "_thumb.jpg");
        $data = (object) array(
            'val_id' => time(),
            'title' => $request->title,
            'content' => $request->content,
            'icon' => $name . "_thumb.jpg",
            'created_at' => date('d/m/Y'),
            'updated_at' => 0
        );
        $curr = DB::table('tb_json')->where('key', 'doing')->select('value')->first()->value;
        $curr = json_decode($curr);
        array_push($curr, $data);
        $json = json_encode($curr);
        DB::table('tb_json')
            ->where('key', 'doing')
            ->update([
                'value' => $json,
                'updated_at' => Carbon::now()
            ]);
        return showMes(false, 'Thành công');
    }
    public function get_all_doing()
    {
        $data = DB::table('tb_json')
            ->where('key', 'doing')
            ->select('value')
            ->first();
        $value = json_decode($data->value);
        usort($value, fn ($a, $b) => $b->val_id <=> $a->val_id);
        $json = (object) ['data' => $value];
        echo json_encode($json, JSON_PRETTY_PRINT);
    }
    public function delete_doing($id = 0)
    {
        $id = intval($id);
        $curr = DB::table('tb_json')->where('key', 'doing')->select('value')->first()->value;
        $curr = json_decode($curr);
        $pos = array_search($id, array_column($curr, 'val_id'));
        $rm = array_splice($curr, $pos, 1)[0];
        $json = json_encode($curr);
        DB::table('tb_json')
            ->where('key', 'doing')
            ->update([
                'value' => $json,
                'updated_at' => Carbon::now()
            ]);
        @unlink(public_path('images/thumbnail') . '/' . $rm->icon);
        @unlink(public_path('images') . '/' . str_replace('_thumb', '', $rm->icon));
        return showMes(false, 'Thành công');
    }
    public function edit_doing(Request $request, $id = 0)
    {
        $data = array();

        $curr = DB::table('tb_json')->where('key', 'doing')->select('value')->first()->value;
        $curr = json_decode($curr);
        $pos = array_search($id, array_column($curr, 'val_id'));

        $file = $request->img_file;
        if (!empty(trim($file))) {
            $file = preg_replace('#^data:image/\w+;base64,#i', '', $file);
            $name = md5(time() . uniqid(rand()));
            $img_upload = Image::make($file);
            $img_upload->save(public_path('images') . '/' . $name . ".jpg");
            $img_upload->resize(400, 720, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img_upload->save(public_path('images/thumbnail') . '/' . $name . "_thumb.jpg");
            $data['icon'] = $name . "_thumb.jpg";
            @unlink(public_path('images/thumbnail') . '/' . $curr[$pos]->icon);
            @unlink(public_path('images') . '/' . str_replace('_thumb', '', $curr[$pos]->icon));
        }
        $data['title'] = $request->title;
        $data['content'] = $request->content;
        $data['updated_at'] = date('d/m/Y');
        foreach ($data as $key => $val) {
            $curr[$pos]->$key = $val;
        }
        $json = json_encode($curr);
        DB::table('tb_json')
            ->where('key', 'doing')
            ->update([
                'value' => $json,
                'updated_at' => Carbon::now()
            ]);
        return showMes(false, 'Thành công');
    }
}
