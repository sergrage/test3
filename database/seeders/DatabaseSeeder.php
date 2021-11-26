<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$carriers = ['Почта России', 'DHL'];
    	$prices = [100, 120, 150];
    	$paymentIntervals = [100, 500, 1000];

    	foreach($carriers as $name) {
    		$carrierModel = \App\Models\Carrier::factory()->create([
                'name' => $name
            ]);

    		$carrier_id = $carrierModel->id;

       		for($i=0; $i<random_int(0, 2); $i++) {
       			$price = $prices[$i];
       			$priceInterval  = $paymentIntervals[$i];

	       		$priceModel = \App\Models\Price::factory()->create([
	                'price' => $price,
	                'carrier_id' => $carrier_id,
	            ]);

	       		$price_id = $priceModel->id;

	       		$priceIntervalModel = \App\Models\PaymentInterval::factory()->create([
	                'interval' => $priceInterval,
	                'price_id' => $price_id,
	            ]);

    		}

    	}




            

        // \App\Models\User::factory(10)->create();
    }
}
