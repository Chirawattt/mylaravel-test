@extends('layout')
@section('title', 'Blog')
@section('content')
    <h2 class="text text-center py-2">บทความทั้งหมด</h2>
    <p class="text text-center">รายละเอียดของบทความทั้งหมด</p>
    <div class="d-flex justify-content-end mb-3">
        <a href="blog/insert" class="btn btn-primary"><span class="bi bi-plus"></span> เพิ่มบทความ</a>
    </div>
    <table class="table table-bordered">
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
                    @if ($item->status == true)
                        <td><span class="badge bg-success">ตีพิมพ์</span></td>
                    @else
                        <td><span class="badge bg-secondary">ฉบับร่าง</span></td>
                    @endif
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
@endsection
