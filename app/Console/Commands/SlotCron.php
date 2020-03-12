<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\SlotBooking;
use Carbon\Carbon;
use Log;

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
        foreach($slots as $slot){
            if(Carbon::parse($slot->expiration)->isPast() && $slot->status == 1){
                $slot->status = 3;
                $slot->save();
                Log::info('Slot Deleted');
            }
        }
        Log::info('Cron Job Ended');
    }
}
