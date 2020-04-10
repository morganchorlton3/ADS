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
        $counter = 0;
        while($counter < 5){
            if(VehicleRuns::where('deliveryDate', Carbon::now()->addDays($counter)->format('Y-m-d'))->get()->count() == 0){
                $slots = Slot::all(); 
                $hourCounter = 0;
                foreach($slots as $slot){
                    for($i = 1; $i <= 3; $i++){
                        $vehicleRun = new VehicleRuns();
                        $vehicleRun->run = $i;
                        $vehicleRun->vanAssignment = 2;
                        $vehicleRun->group = 1;
                        $vehicleRun->slotID = $slot->id;
                        $vehicleRun->deliveryDate = Carbon::now()->addDay($counter);
                        $vehicleRun->last_postcode = Store::first()->postCode;
                        $vehicleRun->run_time = Carbon::parse('08:00:00')->addHour($hourCounter);
                        $vehicleRun->save();
                        $hourCounter++;
                    }
                }
                Log::info('Van run Ended');
            }else{
                Log::info('Van trips already created');
            }
            $counter++;
        }
    }
}
