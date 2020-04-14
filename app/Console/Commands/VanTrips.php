<?php

namespace App\Console\Commands;

use App\Deliveries;
use App\DeliverySchedule;
use Illuminate\Console\Command;
use Carbon\Carbon;
use Log;
use App\VehicleRun;
use App\Store;
use App\Slot;

class VanTrips extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delivery:createVanTrips';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create van trips for the next day';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Log::info('Creating Van Trips For the week');
        //Weekday Counter
        for($dayCounter = 0; $dayCounter < 7; $dayCounter++){ 
            //Get Delivery Schedule
            $deliverySchedules = DeliverySchedule::all();
            foreach($deliverySchedules as $deliverySchedule){
                $vehicleRun = new VehicleRun();
                $vehicleRun->run = $deliverySchedule->run;
                $vehicleRun->deliveryDate = Carbon::now()->addDay($dayCounter);
                $vehicleRun->lastPostCode = Store::first()->postCode;
                $vehicleRun->runTime = $deliverySchedule->start;
                $vehicleRun->runEnd = $deliverySchedule->end;
                $vehicleRun->deliverySchedule = $deliverySchedule->id;
                $vehicleRun->save();
            }
        }
    }
}
