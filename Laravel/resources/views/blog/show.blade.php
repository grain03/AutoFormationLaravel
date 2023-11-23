@extends('base')

@section('title', $post->title)

@section('content')
    <article>
        <h2>{{$post->title}}</h2>
        <p>{{$post->content}}</p>
        <p>
            <a class='btn btn-primary' href="{{ route('blog.show', ['slug' => $post->slug, 'id' => $post->id])}}">Lire la suite</a>
        </p>
    </article>
@endsection