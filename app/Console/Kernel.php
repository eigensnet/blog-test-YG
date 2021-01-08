<?php

namespace App\Console;

use App\Models\Category;
use App\Models\Post;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
         $schedule->call( function (){
              Post::create(
                 [
                     'title'       => 'Zusammenfassung : ' . Carbon::now()->format('m-y'),
                     'body'        => 'Zusammenfassung inhalt',
                     'category_id' => rand(Category::orderBy('id','ASC')->pluck('id')->first(),Category::orderBy('id','ASC')->pluck('id')->last()),
                     'user_id'     => (User::where('is_admin', 1)->first())->id,
                 ]
             );
         })->monthly();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
