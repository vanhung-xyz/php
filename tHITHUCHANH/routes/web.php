<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookControllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Book;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $book  = DB::table('book')->get();
    return view('/infomation', compact('book'));
});

Route::get('/adds', function () {
    return view('createBook');
});

// Route::post('/create', [BookController:: class, 'create']);

Route::post('/create', function (Request $request) {
    DB::table('book')->insert([
        'authorid' => $request->input('authorid'),
        'title' => $request->input('title'),
        'ISBN' => $request->input('isbn'),
        'pub_year' => $request->input('pub_year'),
        'available' => $request->input('available'),
    ]);
    return redirect('/')->with('success');
});

Route::get('/search', function(){
    return view('/search');
});
Route::get('/searchTitle', [BookControllers::class, 'search']);


