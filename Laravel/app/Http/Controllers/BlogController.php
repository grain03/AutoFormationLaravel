<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BlogController extends Controller
{
    public function index(): Paginator
    {
        return Posts::paginate(1);
    }

    public function show(string $slug, string $id): RedirectResponse | Posts
    {
        $post = new Posts();
        $post = $post::findOrFail($id);
        if($post->slug !== $slug){
            return to_route('blog.show', ['slug' => $post->slug, 'id' => $post->id]);
        }
        return $post;
    }
}
