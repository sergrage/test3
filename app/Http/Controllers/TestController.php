<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{

    public function sql()
    {
        return view('app.sql');
    }

    public function showOlympiadPage()
    {
    return view('app.olympiad');
    }

    public function testSql()
    {
        $users = User::whereHas('orders')->get();
        $products = Product::whereHas('catalog')->get();
        return view('app.sql', compact('users', 'products'));
    }

}
