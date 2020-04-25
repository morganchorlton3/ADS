<?php

namespace App\Console\Commands;

use App\Deliveries;
use App\DeliverySchedule;
use Illuminate\Console\Command;
use App\DeliveryVehicle;
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
            foreach($deliverySchedules as $schedule){
                $run = new VehicleRun();
                $run->run = $schedule->run;
                $run->deliveryDate = Carbon::now()->addDays($dayCounter);
                $run->lastPostCode = Store::first()->postCode;
                $run->runTime = $schedule->start;
                $run->save();
            }

        }
    }
}
