<?php

/*Controller
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('sayhello','Hellocontroller@index');

Route::get('sayhello/{fname?}','Hellocontroller@index');

Route::get('example',function(){
    return view('example');
});

Route::get('/', function () {
    return view('welcome');
});

Route:: get('age/{age?}','Agecontroller@age');

Route::get('subject','Subjectcontroller@index');

Route::get('hey',function(){
    return view('hey');
});

Route::get('/contact','Contactcontroller@index');
Route::post('/contactins','Contactcontroller@store')->name('contactstore');

// route for category -start
Route::get('/category','Assignment5Controller@index')->name('category');
Route::post('/add_category','Assignment5Controller@insert_category')->name('addcategory');
Route::get('/edit_category/{id?}','Assignment5Controller@edit_category')->name('edit');
Route::get('/delete/{id?}','Assignment5Controller@delete_category')->name('delete');
Route::get('/list_category','Assignment5Controller@show_category')->name('listcategory');
Route::post('/update_category','Assignment5Controller@update_category')->name('updatecategory');
Route::post('/delete_all_category','Assignment5Controller@deleteall_category')->name('deleteall');
// route for category -end

// route for product -start
Route::get('/product','Assignment5Controller@index1')->name('product');
Route::post('/add_product','Assignment5Controller@insert_product')->name('addproduct');
Route::get('/list_products','Assignment5Controller@show_product')->name('listproduct');
Route::get('/edit_product/{id?}','Assignment5Controller@edit_product')->name('editproduct');
Route::get('/delete_product/{id?}','Assignment5Controller@delete_product')->name('deleteproduct');
Route::post('/update_product','Assignment5Controller@update_product')->name('updateproduct');
Route::post('/delete_all_product','Assignment5Controller@deleteall_product')->name('deleteallproduct');
//route for product -end