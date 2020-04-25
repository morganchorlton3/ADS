<?php

namespace App\Console\Commands;

use App\DeliverySchedule;
use App\DeliveryVehicle;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\DeliveryVehicleProfile;
use App\Slot;
use App\SlotBooking;
use Carbon\Carbon;
use App\VehicleRun;

class OrganiseDeliveries extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delivery:organise';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Organise Deliveries for next working day';

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
        $slots = Slot::all();
        $vehicleRun = VehicleRun::where('deliveryDate', Carbon::now()->addDay(1)->format('Y-m-d'))->get();
        $deliverySchedules = DeliverySchedule::all();
        $counter = 0;
        foreach($deliverySchedules as $deliverySchedule){
            $slot = $slots->find($counter);
            if(Carbon::parse($slot->end)->isBefore(Carbon::parse($deliverySchedule->end))){
                $counter++;
            }
        }
        dd($counter);
    }
}
