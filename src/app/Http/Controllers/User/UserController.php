<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('');
    }

    public function accountSettings(Request $request)
    {
        $user = $request->user();
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"],
            ['link' => "javascript:void(0)", 'name' => "Pages"],
            ['name' => "Account Settings"]
        ];

        return view('/content/pages/page-account-settings', ['breadcrumbs' => $breadcrumbs, 'user' => $user]);
    }

    public function generalSave(UserRequest $request)
    {

    }
}
