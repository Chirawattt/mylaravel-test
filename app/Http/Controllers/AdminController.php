<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // query builder
use App\Models\Blog; // Eloquent ORM

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        return view('home');
    }

    function displayAbout()
    {
        $name = "Chrwyn";
        $date = date('d M Y');
        return view('about', compact('name', 'date'));
    }

    function getAllBlogs()
    {
        // $blogs = Blog::paginate(5); // Eloquent ORM
        $blogs = DB::table('blogs')->paginate(5); // query builder
        return view('blog', compact('blogs'));
    }

    function insertPage()
    {
        return view('blogInsert');
    }

    function insertBlog(Request $request)
    {
        $request->validate(
            [ // validate ค่าที่รับมา ถ้าไม่ผ่านจะ return กลับไปหน้าเดิม
                'title' => 'required|max:50', // ต้องไม่เป็นค่าว่าง และต้องมีความยาวไม่เกิน 50 ตัวอักษร
                'content' => 'required', // ต้องไม่เป็นค่าว่าง
            ],
            [ // ปรับแต่ง error message ที่เราจะส่งกลับไป
                'title.required' => 'กรุณากรอกชื่อบทความ',
                'title.max' => 'ชื่อบทความต้องมีความยาวไม่เกิน 50 ตัวอักษร',
                'content.required' => 'กรุณากรอกเนื้อหาบทความ',
            ]
        );
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->save(); // `created_at` and `updated_at` are automatically set
        return redirect('blog');
    }

    function updateBlogPage($id)
    {
        $blog = Blog::find($id);
        return view('blogEdit', compact('blog'));
    }

    function updateBlog(Request $request, $id)
    {
        $oldBlog = Blog::find($id);
        $request->validate(
            [
                'title' => 'required|max:50',
                'content' => 'required',
            ],
            [
                'title.required' => 'กรุณากรอกชื่อบทความ',
                'title.max' => 'ชื่อบทความต้องมีความยาวไม่เกิน 50 ตัวอักษร',
                'content.required' => 'กรุณากรอกเนื้อหาบทความ',
            ]
        );

        if ($request->title == $oldBlog->title && $request->content == $oldBlog->content) {
            return redirect()->back()->withErrors(['sameData' => 'ไม่มีข้อมูลใหม่ที่จะอัพเดท']);
        }

        $oldBlog->title = $request->title;
        $oldBlog->content = $request->content;
        $oldBlog->save();
        return redirect('blog');
    }

    function updateStatus($id)
    {
        $blog = Blog::find($id);
        $blog->status = !$blog->status;
        $blog->save();
        return redirect('blog');
    }

    function deleteBlog($id)
    {
        DB::table('blogs')->where('id', $id)->delete();
        return redirect('blog');
    }

    function displayContact()
    {
        return view('contact');
    }
}
