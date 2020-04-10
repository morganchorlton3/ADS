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
        Log::info('Creating Van Trips');
        if(VehicleRuns::where('deliveryDate', Carbon::now()->addDay(1)->format('Y-m-d'))->get()->count() == 0){
            /*for($i=DeliveryVehicle::count(); $i > 0; $i--){
                for($j=1; $j <= 3; $j++){ 
                    $vehicleRun = new VehicleRuns();
                    $vehicleRun->run = $j;
                    $vehicleRun->vanAssignment = $i;
                    $vehicleRun->group = 0;
                    $vehicleRun->deliveryDate = Carbon::now()->addDay(1);
                    $vehicleRun->last_postcode = Store::first()->postCode;
                    if($j == 1){
                        $vehicleRun->run_time = Carbon::parse('08:00:00');
                    }else if($j == 2){
                        $vehicleRun->run_time = Carbon::parse('13:00:00');
                    }else if($j == 3){
                        $vehicleRun->run_time = Carbon::parse('18:00:00');
                    }
                    $vehicleRun->save();
                }
            }*/
            $slots = Slot::all();
            for($j=1; $j <= 3; $j++){ 
                $counter = 0;
                foreach($slots as $slot){
                    $vehicleRun = new VehicleRuns();
                    $vehicleRun->run = $j;
                    $vehicleRun->vanAssignment = $j;
                    $vehicleRun->group = 0;
                    $vehicleRun->slotID = $slot->id;
                    $vehicleRun->deliveryDate = Carbon::now()->addDay(1);
                    $vehicleRun->last_postcode = Store::first()->postCode;
                    $vehicleRun->run_time = Carbon::parse('08:00:00')->addHour($counter);
                    $vehicleRun->save();
                    $counter++;
                }
            }
            Log::info('Van run Ended');
        }else{
            Log::info('Van trips already created');
        }
    }
}
