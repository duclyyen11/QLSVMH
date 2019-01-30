<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    return redirect()->route('index');
});

Route::get('test', function () {
//    $mh = new App\Mh(['name'=>'Sinh lý']);
//    $sv = App\Sv::find(1);
//    dd($sv->mhs()->save($mh));
//    dd($sv->mhs()->create([
//        'name'=>'Lý'
//    ]));
      dd(App\Sv::has('subjects','>',3)->get());

});

Route::resource('home','HomeController')->names(['index'=>'index']);
Route::resource('student','StudentController')->names(['student'=>'index']);
Route::resource('subject','SubjectController')->names(['subject'=>'index']);
