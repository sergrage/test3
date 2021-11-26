<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carrier;

use App\Services\TestService;

class TestController extends Controller
{

	protected $service;

    public function __construct(TestService $service) {
        $this->service = $service;
    }


    public function carriers() 
    {
    	$carriers = Carrier::all();
    }

    public function workers(Request $request) 
    {
    	$requestDate = $request['district'];

    	return $this->service->findWorker($requestDate);
    }
}
