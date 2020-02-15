<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\DeliveryVehicleProfile;
use App\SlotBooking;
use Carbon\Carbon;

class organiseDeliveries extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deliveries:organise';

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
        /*$vanProfile = new DeliveryVehicleProfile;
        $vanProfile->van_id  = 1;
        $vanProfile->delivery_schedule_id = 1;
        $vanProfile->save();*/
        $deliveries = SlotBooking::where('date', Carbon::now()->addDays(1)->format('y-m-d'))->where('slot_id', 1)->get();
        echo $deliveries; 
    }
}
