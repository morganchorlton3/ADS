<?php

namespace App\Console\Commands;

use App\Deliveries;
use App\DeliverySchedule;
<<<<<<< HEAD
use Illuminate\Console\Command;
=======
>>>>>>> 364136cf80041101472505b69da979fe8945ff48
use App\DeliveryVehicle;
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
        $deliverySchedules = DeliverySchedule::all();
        for($dayCounter = 0; $dayCounter < 7; $dayCounter++){ 
<<<<<<< HEAD
            foreach($deliverySchedules as $schedule){
                $run = new VehicleRun();
                $run->run = $schedule->run;
                $run->deliveryDate = Carbon::now()->addDays($dayCounter);
                $run->lastPostCode = Store::first()->postCode;
                $run->runTime = $schedule->start;
                $run->save();
=======
            //Get Delivery Schedule
            $deliverySchedules = DeliverySchedule::all();
            for($i = DeliveryVehicle::count(); $i > 0; $i--){
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
>>>>>>> 364136cf80041101472505b69da979fe8945ff48
            }

        }
    }
}
