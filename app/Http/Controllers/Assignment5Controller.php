<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use DB;
use Validator;
use Illuminate\Support\Facades\Storage; 
class Assignment5Controller extends Controller
{
    // function to load add_category view -start
    function index(){ 
        return view('add_category');
    }
    // function to load add_category view -end


    // function to load add_product view -start
    function index1(){
        $categories = DB::table('categories')->orderByRaw('id DESC')->get();
        return view('add_product',['categories'=>$categories]);

    }
    // function to load add_product view -end


    // function to insert category -start
    function insert_category(Request $request){
        $this->validate($request,['categoryname'=>'required|alpha']);
        
        //dd($request->all());
        $category= new Category();
        $category->categoryname=$request->categoryname;
        $category->save();
        return redirect()->route('listcategory');
    }
    // function to insert category -end


    // function to show all categories -start
    function show_category(){

        $categories = DB::table('categories')->orderByRaw('id DESC')->get();
        return view('list_categories',['categories'=>$categories]);

    }
    // function to show all categories -end


    // function to fetch the category  detail -start
    function edit_category($id){
        $row = DB::table('categories')->where('id','=' ,$id)->first();
        return view('add_category',['row'=>$row,'id'=>$id]);
    }
    // function to fetch the category  detail -end


    // function to update the category  -start
    function update_category(Request $request){
        $this->validate($request,['categoryname'=>'required|alpha']);
        $data=['categoryname'=> $request->categoryname] ;       
        $row = DB::table('categories')->where('id','=' ,$request->id)->update($data);
        return redirect()->route('listcategory');

    }
    // function to update the category  -end


    // function to delete the category  -start
    function delete_category($id){
        DB::table('categories')->where('id', '=', $id)->delete();
        return redirect()->route('listcategory');

    }
    // function to delete the category  -end


    // function to delete all selected the category  -start
    function deleteall_category(Request $request){
        //print_r($request->checkbox);  
        for($i=0; $i<count($request->checkbox); $i++){
            DB::table('categories')->where('id', '=', $request->checkbox[$i])->delete();
        }
        return redirect()->route('listcategory');

    }
    // function to delete all selected the category  -end


    // function to insert the product  -start
    function insert_product(Request $request)
    {
        $this->validate($request,['productname'=>'required']);
        if($request->productimage==""){
            $image=$request->productimage='';
        }
        else{
            $name=time().'-'.$request->file('productimage')->getClientOriginalName();
            $image= $request->file('productimage')->storeAs('productimages',$name);
        }
        $data=['productname'=>$request->productname,'productprice'=>$request->productprice,'productimage'=>$image,'category'=>$request->category];
        DB::table('products')->insert($data);
        return redirect()->route('listproduct');
    }
    // function to insert the product  -end


    // function to show all products  -start
    function show_product(){
        $products= DB::table('products')
                ->join('categories', 'products.category', '=', 'categories.id')
                ->select('products.*', 'categories.categoryname as categoryname')
                ->orderBYRaw('id DESC')
                ->get();
        return view('list_products',['products'=>$products]);
    }
    // function to show all products -end


    // function to fetch product detail  -start
    function edit_product($id){
        $row = DB::table('products')->where('id','=' ,$id)->first();
        $categories = DB::table('categories')->orderByRaw('id DESC')->get();
        return view('add_product',['row'=>$row,'id'=>$id,'categories'=>$categories]);

    }
    // function to fetch product detail  -end


    // function to update the product detail -start
    function update_product(Request $request){
        $pimage = DB::table('products')->where('id','=' ,$request->id)->first();
        if($request->productimage==""){
            $image=$pimage->productimage;
        }
        else{
           $name=time().'-'.$request->file('productimage')->getClientOriginalName();
           $image= $request->file('productimage')->storeAs('productimages',$name);

        }
        
        $data=['productname'=>$request->productname,'productprice'=>$request->productprice,'productimage'=>$image,'category'=>$request->category];       
        $row = DB::table('products')->where('id','=' ,$request->id)->update($data);
        return redirect()->route('listproduct');
    }
    // function to update the product detail  -end


    // function to delete product -start
    function delete_product($id){
        DB::table('products')->where('id', '=', $id)->delete();
        return redirect()->route('listproduct');
    }
    // function to delete product  -end

    
    // function to delete all selected products -start
    function deleteall_product(Request $request){
        //print_r($request->checkbox);  
        for($i=0; $i<count($request->checkbox); $i++){
            DB::table('products')->where('id', '=', $request->checkbox[$i])->delete();
        }
        return redirect()->route('listproduct');
    }
    // function to delete all selected products -end


}
