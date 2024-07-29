@extends('layouts.app')
@section('title', 'Blog')
@section('content')
    <h2 class="text text-center py-2">บทความทั้งหมด</h2>
    <p class="text text-center">รายละเอียดของบทความทั้งหมด</p>
    <div class="d-flex justify-content-end mb-3">
        <a href="blog/insert" class="btn btn-primary"><span class="bi bi-plus"></span> เพิ่มบทความ</a>
    </div>
    @if (count($blogs) > 0)
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr class="text-center">
                    <th scope="col">ชื่อบทความ</th>
                    <th scope="col">เนื้อหา</th>
                    <th scope="col">สถานะ</th>
                    <th scope="col">การทำงาน</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $item)
                    <tr class="text-center">
                        <td>{{ $item->title }}</td>
                        <td>{{ Str::limit($item->content, 10) }}</td>
                        <td>
                            @if ($item->status == true)
                                <a href="/blog/updateStatus/{{ $item->id }}" class="btn btn-success">เผยแผร่</a>
                            @else
                                <a href="/blog/updateStatus/{{ $item->id }}" class="btn btn-secondary">ฉบับร่าง</a>
                            @endif
                        </td>
                        <td class="d-flex gap-2 justify-content-center">
                            <a href="blog/update/{{ $item->id }}" class="btn btn-primary">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <a href="blog/delete/{{ $item->id }}" class="btn btn-danger"
                                onclick="return confirm('ยืนยันการลบบทความ {{ $item->title }} หรือไม่')">
                                <i class="bi bi-trash-fill"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            {{ $blogs->links() }}
        </div>
    @else
        <div class="alert alert-warning text-center" role="alert">
            ไม่มีข้อมูลบทความ
        </div>
    @endif
@endsection
