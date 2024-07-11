@extends('layout')
@section('title', 'Blog')
@section('content')
    <h1>Blog</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptates.</p>
    <hr>
    @foreach ($contents as $item)
        <h4>{{ $item['title'] }}</h4>
        <p>{{ $item['content'] }}</p>
        @if ($item['status'] == true)
            <span class="badge bg-success">Published</span>
        @else
            <span class="badge bg-danger">Draft</span>
        @endif
        <hr>
    @endforeach
@endsection
