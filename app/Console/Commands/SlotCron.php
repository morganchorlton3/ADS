<?php

namespace App\Console\Commands;

use App\Deliveries;
use Illuminate\Console\Command;
use App\SlotBooking;
use Carbon\Carbon;
use Log;
use App\VehicleRuns;
use App\Store;


class SlotCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'slots:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear Booked slots where orders havent been placed within 2 hours';

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
        Log::info('Cron Job Started');
        $slots = SlotBooking::all();
        $storePostCode = Store::first()->postCode;
        foreach($slots as $slot){
            if(Carbon::parse($slot->expiration)->isPast() && $slot->status == 1){
                $slot->status = 3;
                $slot->save();
                $vehicleRun = VehicleRuns::find($slot->van_run);
                $counter = 0;
                $delivery = Deliveries::where('userID', $slot->user_id)->where('postCode', $slot->post_code)->first();
                $delivery->delete();
                $deliveries = Deliveries::where('slotID', $slot->id)->where('group', $slot->van_run)->get();
                $runTime = 0;
                foreach($deliveries as $delivery){
                    if($counter == 0){
                        $runTime = carbon::parse($slot->start)->addSeconds(getRouteTime($storePostCode, $delivery->postCode));
                        $lastPostCode = $delivery->postCode;
                    }else{
                        $runTime = $runTime->addSeconds(getRouteTime($lastPostCode, $delivery->postCode));
                    }
                    $counter++;
                }
                $vehicleRun->run_time = $runTime;
                $vehicleRun->last_postcode = Deliveries::latest()->where('deliveryDate', Carbon::parse($slot->date)->format('Y:m:d'))->where('group', $slot->van_run)->first()->postCode;
                Log::info('Slot Deleted');
            }
        }
        Log::info('Cron Job Ended');
    }
}
