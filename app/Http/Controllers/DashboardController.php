<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UploadBukuRequest;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }
    public function uploadbuku(UploadBukuRequest $request)
    {
        $slug = Str::slug($request->title);

        if ($request->validated()) {
            Post::create([
                'title' => $request->title,
                'author_id' => $request->author_id,
                'category_id' => $request->category_id,
                'slug' => $slug,
                'body' => $request->body,
            ]);
        }
        return redirect('/')->with('pesan', 'Upload Buku berhasil');
    }
}
