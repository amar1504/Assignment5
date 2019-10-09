<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;
use Validator; 

class Assignment5Controller extends Controller
{
    function index(){
        
        return view('add_category');

    }

    function insert_category(Request $request){
        $validator= Validator::make($request->all(), ['categoryname'=>'required|alpha']);
        if($validator->fails()){
            return redirect()
                        ->back()
                        ->withInput();
        }
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
        $validator= Validator::make($request->all(), ['categoryname'=>'required|alpha']);
        if($validator->fails()){
            return redirect()
                        ->back()
                        ->withInput();
        }

        $data=['categoryname'=> $request->categoryname] ;       
        $row = DB::table('categories')->where('id','=' ,$request->id)->update($data);
        return $this->show_category();
    }


    function delete_category($id){
        DB::table('categories')->where('id', '=', $id)->delete();
        return $this->show_category();
    }

    function deleteall_category(Request $request){
        //print_r($request->checkbox);  
        for($i=0; $i<count($request->checkbox); $i++){
            DB::table('categories')->where('id', '=', $request->checkbox[$i])->delete();
        }
        return $this->show_category();
    }
}
