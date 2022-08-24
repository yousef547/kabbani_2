<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }
    public function check_domein($name)
    {
        $domein = User::where('sub_domain', $name)->first();
        if ($domein == null || $domein == " ") {
            return response()->json(['status' => false]);
        } else {
            return response()->json(['status' => true]);
        }
    }
}
