<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
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
        $categories = DB::table('categories')->get();
        return view('list_categories',['categories'=>$categories]);

    }
}
