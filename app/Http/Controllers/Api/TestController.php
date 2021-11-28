<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carrier;

use App\Http\Resources\CarrierResource;

use App\Services\TestService;

class TestController extends Controller
{

	protected $service;

    public function __construct(TestService $service) {
        $this->service = $service;
    }


    public function carriers()
    {
        return CarrierResource::collection(Carrier::with('prices')->get());

//        return Carrier::find(1)->prices;
    }

    public function workers(Request $request)
    {
    	$requestDate = $request['district'];

    	return $this->service->findWorker($requestDate);
    }

    public function crossIntervals(Request $request) {
        $requestInterval = $request['interval'];

        return $this->service->crossingIntervals($requestInterval);
    }
}
