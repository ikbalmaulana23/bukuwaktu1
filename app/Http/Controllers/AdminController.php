<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data = [
            'posts' => Post::get(),
            'users' => User::get(),
        ];
        return view('adminDashboard.dashboard', $data);
    }
}
