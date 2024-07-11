<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'About',
            'list'  => ['Home', 'About']
        ];

        $activeMenu = 'about';

        $users = User::all();

        $page = (object) [
            'title' => 'About User'
        ];

        return view('about.index', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu, 'users' => $users, 'page' => $page]);
    }
}
