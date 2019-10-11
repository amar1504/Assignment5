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


// route for category -start
Route::get('/category','Assignment5Controller@index')->name('category');
Route::post('/add_category','Assignment5Controller@insertCategory')->name('category.add');
Route::get('/edit_category/{id?}','Assignment5Controller@editCategory')->name('category.edit');
Route::get('/delete/{id?}','Assignment5Controller@deleteCategory')->name('category.delete');
Route::get('/list_category','Assignment5Controller@showCategory')->name('category.list');
Route::post('/update_category','Assignment5Controller@updateCategory')->name('category.update');
Route::post('/delete_all_category','Assignment5Controller@deleteallCategory')->name('category.deleteall');
// route for category -end

// route for product -start
Route::get('/product','Assignment5Controller@index1')->name('product');
Route::post('/add_product','Assignment5Controller@insertProduct')->name('product.add');
Route::get('/list_products','Assignment5Controller@showProduct')->name('product.list');
Route::get('/edit_product/{id?}','Assignment5Controller@editProduct')->name('product.edit');
Route::get('/delete_product/{id?}','Assignment5Controller@deleteProduct')->name('product.delete');
Route::post('/update_product','Assignment5Controller@updateProduct')->name('product.update');
Route::post('/delete_all_product','Assignment5Controller@deleteallProduct')->name('product.deleteall');
//route for product -end