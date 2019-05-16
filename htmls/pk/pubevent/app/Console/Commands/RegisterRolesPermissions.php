<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use App\Models\Role;

class RegisterRolesPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'register:RolesPermissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Linking the right permission to the role.';
    

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $user_section= ['user-list[Admin]','user-delete[Admin]','roles[Admin]'];
        $event_section= ['event-create[Admin]','event-delete[Admin]','event-update[Admin]'];
        $event_group_section= ['event-group-list[Admin]','event-group-create[Admin]','event-group-delete[Admin]','event-group-info[Admin]','event-group-update[Admin]','group-list[Admin]'];
        $email_template_section= ['email-template-info[Admin]','email-template-update[Admin]'];
        $send_email= ['template-info[Admin]','send-mail[Admin]'];

        $admin_access =array_merge($user_section, $event_section, $event_group_section, $email_template_section, $send_email);
        $normal_access = ['user-info[User]','user-update[User]','event-list[User]','event-info[User]'];

        $admin_role = Role::find(1);
        $admin_role->permissions()->sync($admin_access);
        \Cache::forget('role_access.1');
        \Cache::forever('role_access.1', $admin_access);

        $normal_role = Role::find(2);
        $normal_role->permissions()->sync($normal_access);
        \Cache::forget('role_access.2');
        \Cache::forever('role_access.2', $normal_access);
    }
}