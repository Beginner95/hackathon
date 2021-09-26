<?php

namespace App\Http\Controllers;


use App\Models\Destitute\Destitute;
use App\Models\Sonko\Sonko;
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
        $sonkos = Sonko::query()->where('status', 'active')->get();
        $destitute = Destitute::query()->where('deleted_at', null)->get()->count();


        return view('content.dashboard.dashboard-ecommerce', [
            'users_count' => $users,
            'sonkos' => $sonkos,
            'destitutes_count' => $destitute,
        ]);
    }
}
