<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Posts;

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
    return view('welcome');
});

Route::prefix('/blog')->name('blog.')->group(function (){
    Route::get('/', function (Request $request) {
        
        $post = new Posts();
        return $post::paginate(25);


    })->name('index');
    
    
    
    Route::get('/{slug}-{id}', function (string $slug, string $id, Request $request) {
        $post = new Posts();
        return $post::findorFail($id);
        if($post->slug !== $slug){
            return to_route('blog.show', ['slug' => $post->slug])
        }
    })->where([
        'id' => '[0-9]+',
        'slug' => '[a-z0-9\-]+',
    ])->name('show');

});

