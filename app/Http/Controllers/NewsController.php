<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index(){
        $news = DB::table("tbl_events")->get();
        return view("admin.delivery.news.index_news",["events"=>$news]);
    }

    //open trang 'tao san pham moi'
    public function create()
    {
        return view("create/news");
    }

    //doc du lieu cua form 'tao san pham moi' va luu vo DB
    public function createPost(Request $request){
        //nhan tat ca du lieu tren form vo bien mang product
        $news =$request->all();
        $imageName = null;
        //kiem tra trong so cac phan tu du lieu nay, co pt kieu 'file' ten la 'fileImage' ?
        if($request->hasFile('fileImage')){
            //lay doi tuong file
            $file = $request->file('fileImage');
            $ext = $file->getClientOriginalExtension();//lay ten mo rong cua file
            if($ext != 'png' && $ext != 'jpg' && $ext != 'jpeg' && $ext != 'gif'){
                return redirect('create/news')->with('err_msg','chi duoc upload cac file JPEG,PNG,GIF!');
            }
            if($file->getSize()>100000){
                return redirect('create/news')->with('err_msg','chi duoc upload file <= 100k !');
            }
            $imageName = $file->getClientOriginalName();
            $file->move("images",$imageName);

        }
        //luu du lieu vo DB
        DB::table('tbl_events')->insert([
            'topic'=> $news['topic'],
            'content'=> $news['content'],
            'image'=>$imageName
        ]);
        return redirect('index/news');
    }
    //Open trang 'Thay doi thong tin san pham'
    public function update($id){
        $product = DB::table('tbl_events')->where('id',$id)->first();
        return view('update/news',['n'=>$id]);

        // return view('product.update',compact=>$product)
    }
    // doc du lieu cua form'thay doi thon tin san pham' va luu vao database
    public function updatePost(Request $request, $id){
        $news = $request->all();
        $imageName = null;
        if($request->hasFile('fileImage')){
            //lay doi tuong file
            $file = $request->file('fileImage');
            $ext = $file->getClientOriginalExtension();//lay ten mo rong cua file
            if($ext != 'png' && $ext != 'jpg' && $ext != 'jpeg' && $ext != 'gif'){
                return redirect('update/news'.$id)->with('err_msg','chi duoc upload cac file JPEG,PNG,GIF!');
            }
            if($file->getSize()>100000){
                return redirect('update/news')->with('err_msg','chi duoc upload file <= 100k !');
            }
            $imageName = $file->getClientOriginalName();
            $file->move("images",$imageName);

        }else{
            $imageName = DB::table('tbproduct')->where('id',intval($id))->first()->image;
        }
        //luu du lieu vo DB
        DB::table('tbl_events')->where('id',intval($id))->update([
            'topic'=> $news['topic'],
            'content'=> $news['content'],
            'image'=>$imageName
        ]);
        return redirect('index/news');
    }
    //xoa san pham theo id
    public function delete($id){
        DB::table('tbl_events')->delete($id);
        return redirect('index/events');
    }
}
