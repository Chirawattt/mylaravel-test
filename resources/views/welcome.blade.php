@extends('layouts.app')
@section('title', 'Blog Available')
@section('content')
    <h2 class="text text-center py-2">อ่านบทความ</h2>
    @if (count($blogs) > 0)
        @foreach ($blogs as $blog)
            <h2>{{ $blog->title }}</h2>
            <p>{{ $blog->content }}</p>
            <a href="#">อ่านเพิ่มเติม</a>
            <hr>
        @endforeach
    @else
        <div class="alert alert-warning text-center" role="alert">
            ไม่มีข้อมูลบทความ
        </div>
    @endif
@endsection
