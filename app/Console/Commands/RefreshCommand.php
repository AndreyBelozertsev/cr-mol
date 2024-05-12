<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class RefreshCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh command';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if(app()->isProduction()){
            return Command::FAILURE;
        }

        $this->call('cache:clear');
        Storage::deleteDirectory('app/public/images'); 

        File::copyDirectory( storage_path('fixtures'), storage_path('app/public'));
        $this->call('migrate:fresh',[
            '--seed' => true
        ]);


        $this->call('moonshine:user',[
            '--username' => env('ADMIN_EMAIL'),
            '--name' => env('ADMIN_NAME'),
            '--password' => env('ADMIN_PASSWORD')

        ]);
        
        return Command::SUCCESS;
    }
}
