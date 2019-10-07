<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;

class Assignment5Controller extends Controller
{
    function index(){
        
        return view('add_category');

    }

    function insert_category(Request $request){
        $this->validate($request,['categoryname'=>'required|alpha']);
        //dd($request->all());
        $category= new Category();
        $category->categoryname=$request->categoryname;
        $category->save();
         return $this->show_category();
    }

    function show_category(){

        $categories = DB::table('categories')->orderByRaw('id DESC')->get();
        return view('list_categories',['categories'=>$categories]);

    }

    function edit_category($id){
        $row = DB::table('categories')->where('id','=' ,$id)->first();
        return view('add_category',['row'=>$row,'id'=>$id]);
    }

    function update_category(Request $request){
        $data=['categoryname'=> $request->categoryname] ;       
        $row = DB::table('categories')->where('id','=' ,$request->id)->update($data);
        return $this->show_category();
    }


    function delete_category($id){
        DB::table('categories')->where('id', '=', $id)->delete();
        return $this->show_category();
    }
}
