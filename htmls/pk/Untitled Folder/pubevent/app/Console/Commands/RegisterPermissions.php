<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RegisterPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'register:Permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Register all the permission in permissions table, permissions are mention in web.php';
    

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $routes = \Route::getRoutes();
        
        $permission_data = [];

        foreach ($routes as $route) {

            if(!isset($route['action']['middleware'])){
                continue;
            }

            $middlewares = (array)$route['action']['middleware'];

            foreach($middlewares as $middleware){

                if(strpos($middleware, 'canAccess:') !==false){
                    $permission_name = substr($middleware,10, strlen($middleware));
                    $section_name = explode('canAccess:', $middleware);
                    $section_name = isset($section_name[1])?$section_name[1]:'';
                    
                    $section = explode('-',$section_name);
                    $section_name = isset($section[0]) ? $section[0] : null;

                    $permission_names = explode(',', $permission_name);

                    if($permission_names)foreach ($permission_names as $name) {

                        $permission_data[] = ['name'=> $name, 'title'=>$name,'description'=> $name, 'section'=>$section_name];   
                    }
                }
            }
        }

        if(count($permission_data)) {

            $data = \App\Models\Permission::batchInsertUpdate($permission_data,['section']);            
            $this->comment('Permissions has been registered successfully.');

        }else {

            $this->comment("Permission not found.");
        }

    }
}