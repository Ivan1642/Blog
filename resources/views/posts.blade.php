@extends('app')

@section('title', 'Posts')

@section('content')
    <h1>Posts</h1>
    <ul>
        @foreach($posts as $post)
            <li>
                <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
            </li>
        @endforeach
    </ul>

    {{ $posts->links() }} {{-- paginación --}}
@endsection

