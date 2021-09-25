<?php

namespace App\Http\Controllers;


use App\Models\User;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::query()->get()->count();

        return view('content.dashboard.dashboard-ecommerce', [
            'users_count' => $users
        ]);
    }
}
