<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category; // used model Category
use App\Product; // used model product
use DB;
use Validator; 
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\StoreBlogPostProduct;
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
    function insertCategory(UserStoreRequest $request){
        //$this->validate($request,['categoryname'=>'required|alpha']);
        $validated = $request->validated();

        //dd($request->all());
        /* $category= new Category();
        $category->categoryname=$request->categoryname;
        $category->save();
        */
        Category::create(['categoryname'=>$request->categoryname]);

        return redirect()->route('category.list');
    }
    // function to insert category -end


    // function to show all categories -start
    function showCategory(){

       // $categories = DB::table('categories')->orderByRaw('id DESC')->paginate(2);
        $categories = Category::with('categoryProduct')->withCount('categoryProduct')->orderByRaw('id DESC')->paginate(2);
       //dd($categories);
        return view('list_categories',['categories'=>$categories]);
    }
    // function to show all categories -end


    // function to fetch the category  detail    -start
    function editCategory($id){
       // $row = DB::table('categories')->where('id','=' ,$id)->first();
        $row = Category::where('id','=' ,$id)->first();
        return view('add_category',['row'=>$row,'id'=>$id]);
    }
    // function to fetch the category  detail -end


    // function to update the category  -start
    function updateCategory(UserStoreRequest $request){
        // $this->validate($request,['categoryname'=>'required|alpha']);
        $validated = $request->validated();
        // $data=['categoryname'=> $request->categoryname] ;       
        // $row = DB::table('categories')->where('id','=' ,$request->id)->update($data);

        $category=Category::find($request->id);
        $category->categoryname=$request->categoryname;
        $category->save();
        return redirect()->route('category.list');


    }
    // function to update the category  -end


    // function to delete the category  -start
    function deleteCategory($id){
        // DB::table('categories')->where('id', '=', $id)->delete();
        Category::where('id', '=', $id)->delete();
        return redirect()->route('category.list');

    }
    // function to delete the category  -end


    // function to delete all selected the category  -start
    function deleteallCategory(Request $request){
        //print_r($request->checkbox);  
        for($i=0; $i<count($request->checkbox); $i++){
           // DB::table('categories')->where('id', '=', $request->checkbox[$i])->delete();
            Category::where('id', '=', $request->checkbox[$i])->delete();
        }
        return redirect()->route('category.list');

    }
    // function to delete all selected the category  -end


    // function to insert the product  -start
    function insertProduct(StoreBlogPostProduct $request)
    {
        // $this->validate($request,['productname'=>'required|alpha','productprice'=>'required|numeric','category'=>'required','productimage'=>'image|max:2048']);
        $validated = $request->validated();

        if($request->productimage==""){
            $image=$request->productimage='';
        }
        else{
            $name=time().'-'.$request->file('productimage')->getClientOriginalName();
            $image= $request->file('productimage')->storeAs('productimages',$name);
        }
        $data=['productname'=>$request->productname,'productprice'=>$request->productprice,'productimage'=>$image,'category'=>$request->category];
        // DB::table('products')->insert($data);
        $product=new Product();
        $product->fill($data);
        $product->save();
        return redirect()->route('product.list');
    }
    // function to insert the product  -end


    // function to show all products  -start
    function showProduct(){
       /* $products= DB::table('products')
                ->join('categories', 'products.category', '=', 'categories.id')
                ->select('products.*', 'categories.categoryname as categoryname')
                ->orderBYRaw('id DESC')
                ->paginate(2);
        */
        $products=Product::join('categories', 'products.category', '=', 'categories.id')
                ->select('products.*', 'categories.categoryname as categoryname')
                ->orderBYRaw('id DESC')
                ->paginate(2);
       
        
        return view('list_products',['products'=>$products]);
    }
    // function to show all products -end


    // function to fetch product detail  -start
    function editProduct($id){
       // $row = DB::table('products')->where('id','=' ,$id)->first();
       // $categories = DB::table('categories')->orderByRaw('id DESC')->get();
        $row =Product::where('id','=' ,$id)->first();
        $categories =Category::orderByRaw('id DESC')->get();
       
        return view('add_product',['row'=>$row,'id'=>$id,'categories'=>$categories]);

    }
    // function to fetch product detail  -end


    // function to update the product detail -start
    function updateProduct(StoreBlogPostProduct $request){
        // $this->validate($request,['productname'=>'required|alpha','productprice'=>'required|numeric','category'=>'required','productimage'=>'image|max:2048']);
        $validated = $request->validated();
        
        // $pimage = DB::table('products')->where('id','=' ,$request->id)->first();
        $pimage = Product::where('id','=' ,$request->id)->first();
        if($request->productimage==""){
            $image=$pimage->productimage;
        }
        else{
           $name=time().'-'.$request->file('productimage')->getClientOriginalName();
           $image= $request->file('productimage')->storeAs('productimages',$name);

        }
        
        $data=['productname'=>$request->productname,'productprice'=>$request->productprice,'productimage'=>$image,'category'=>$request->category];       
        // $row = DB::table('products')->where('id','=' ,$request->id)->update($data);
        $product=Product::find($request->id);
        $product->fill($data);
        $product->save();

        return redirect()->route('product.list');
    }
    // function to update the product detail  -end


    // function to delete product -start
    function deleteProduct($id){
       // DB::table('products')->where('id', '=', $id)->delete();
        Product::where('id', '=', $id)->delete();
        return redirect()->route('product.list');
    }
    // function to delete product  -end

    
    // function to delete all selected products -start
    function deleteallProduct(Request $request){
        //print_r($request->checkbox);  
        for($i=0; $i<count($request->checkbox); $i++){
           // DB::table('products')->where('id', '=', $request->checkbox[$i])->delete();
            Product::where('id', '=', $request->checkbox[$i])->delete();
        }
        return redirect()->route('product.list');
    }
    // function to delete all selected products -end


}
