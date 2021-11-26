<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TestService;


class TestController extends Controller
{

	protected $service;

    public function __construct(TestService $service) {
        $this->service = $service;
    }


    public function test1()
    {
        return view('app.workers');
    	// dd($this->service->findWorker('Голиковка'));
    }

    // {
    //     dd($this->service->crossingIntervals('16:00-28:00'));
    // }    public function test2()


    public function test3()
    {
        return view('app.carriers');
    }
}
