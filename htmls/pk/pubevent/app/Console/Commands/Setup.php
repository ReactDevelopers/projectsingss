<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Setup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup Project';
    

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
         if ($this->confirm('All tables will truncate, Do you wish to continue?')) {

                $this->call('db:seed',['--class'=>'Roles']);
                $this->call('db:seed',['--class'=>'EmailTemplateSeeder']);
                $this->call('db:seed',['--class'=>'UserSeeder']);
                $this->call('register:Permissions');
                $this->call('register:RolesPermissions');

                $this->info("Project has been setup successfully, you can login using the PUBNET ID: 99999");
         }
    }
}