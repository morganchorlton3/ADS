<?php

namespace App\Console\Commands;

use App\Deliveries;
use Illuminate\Console\Command;
use App\DeliveryVehicle;
use Carbon\Carbon;
use Log;
use App\VehicleRuns;
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
            //Run Count
            $vehicleRuns = VehicleRuns::where('deliveryDate', Carbon::now()->addDay($dayCounter)->format('Y-m-d'))->get();
            if($vehicleRuns->count() <= 3){
                for($runCounter = 1; $runCounter <= 3; $runCounter++){
                    $slots = Slot::all();
                    $hourCounter = 0;
                        foreach($slots as $slot){
                            $vehicleRun = new VehicleRuns();
                            $vehicleRun->run = $runCounter;
                            $vehicleRun->slotID = $slot->id;
                            $vehicleRun->deliveryDate = Carbon::now()->addDay($dayCounter);
                            $vehicleRun->last_postcode = Store::first()->postCode;
                            $vehicleRun->run_time = Carbon::parse('08:00:00')->addHour($hourCounter);
                            $vehicleRun->save();
                            $hourCounter++;
                        }
                }
            }
        }
    }
}
