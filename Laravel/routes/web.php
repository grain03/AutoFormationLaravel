<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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


Route::get('/blog', function () {
    $post = new  App\Models\Posts();
    $post->title = 'Mon Premier Article';
    $post->slug = 'Mon-Premier-Article';
    $post->content = 'Mon Contenu';
    $post->save();

    return [
        $post
    ];
});



Route::get('/blog/{slug}-{id}', function (string $slug, string $id) {
    return [
        'slug' => $slug,
        'id' => $id,
    ];
});
