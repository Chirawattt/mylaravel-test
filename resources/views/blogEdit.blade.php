@extends('layout')
@section('title', 'แก้ไขบทความ')
@section('content')
    <h2 class="text text-center py-2">แก้ไขบทความ</h2>
    <form method="POST" action="/blog/update/{{ $blog->id }}">
        @csrf {{-- ใส่ Token ป้องกันการโจมตี csrf --}}
        <div class="form-group">
            <label for="title">ชื่อบทความ</label>
            <input type="text" name="title" class="form-control" value="{{ $blog->title }}">
        </div>
        @error('title')
            <div class="my-2 text-danger"><span>{{ $message }}</span></div>
        @enderror
        <div class="form-group">
            <label for="content">เนื้อหาบทความ</label>
            <textarea name="content" cols="30" rows="5" class="form-control">{{ $blog->content }}</textarea>
        </div>
        @error('content')
            <div class="my-2 text-danger"><span>{{ $message }}</span></div>
        @enderror
        @error('sameData')
            <div class="my-2 text-danger"><span>{{ $message }}</span></div>
        @enderror
        <div class="mt-3 d-flex items-center justify-content-between">
            <a href="/blog" class="btn btn-primary">บทความทั้งหมด</a>
            <input type="submit" value="บันทึก" class="btn btn-success">
        </div>
    </form>
@endsection
