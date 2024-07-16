<?php

namespace App\Console\Commands;

use App\Models\ProductUser;
use Carbon\Carbon;
use Illuminate\Console\Command;

class MyContinuousTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'watch';

    /**
     * The console command description.
     *
     * @var string
     */
    public function __construct()
    {
        parent::__construct();
    }
    protected $description = 'watching customer cart to not more that 24 hours';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        while (true) {
            $currentTime = Carbon::now();

            $items  =  ProductUser::all();
            foreach ($items as $item) {

                // $diffHour = $currentTime->diffInHours($item->created_at);
                echo ($item->created_at . "\n");
                echo ($currentTime . "\n");
                $diffHour =    $item->created_at->diffInHours($currentTime);
                echo ("diff hours are " . $diffHour . "\n");
                if (($diffHour > 24)) {
                    $item->product->quantity += 1;
                    $item->product->update();
                    $item->delete();
                };
            }
            sleep(5);
        }
    }
}
