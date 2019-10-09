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

Route::get('/category','Assignment5Controller@index')->name('category');
Route::post('/add_category','Assignment5Controller@insert_category')->name('addcategory');
Route::get('/edit_category/{id?}','Assignment5Controller@edit_category')->name('edit');
Route::get('/delete/{id?}','Assignment5Controller@delete_category')->name('delete');
Route::get('/list_category','Assignment5Controller@show_category');
Route::post('/update_category','Assignment5Controller@update_category')->name('updatecategory');
Route::post('/delete_all_category','Assignment5Controller@deleteall_category')->name('deleteall');

