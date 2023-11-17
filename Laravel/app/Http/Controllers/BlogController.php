<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BlogController extends Controller
{
    public function index(): View
    {
        Posts::paginate(1);
        return view('blog.index');
    }

    public function show(string $slug, string $id): RedirectResponse | Posts
    {
        $post = Posts::findOrFail($id);
        if ($post->slug !== $slug) {
            return to_route('blog.show', ['slug' => $post->slug, 'id' => $post->id]);
        }
    }
}
