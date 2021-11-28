<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\TestService;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{

    public function test4()
    {
        return view('app.users');
    }

    public function test5()
    {
    return view('app.olympiad');
    }

    public function test6()
    {


        DB::transaction(function () {
            $user = DB::connection('mysql')->select('SELECT * FROM `users` WHERE id=1');
            DB::disconnect('mysql_external');
            $task = Task::first();

            $newTask = $task->replicate();
            $newTask->project_id = 16; // the new project_id
            $newTask->save();
        });
    return 123;
    }



}
