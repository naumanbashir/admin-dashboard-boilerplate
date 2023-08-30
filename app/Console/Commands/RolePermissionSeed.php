<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:roles_and_permissions {--fresh}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adding Roles and Permissions';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->line("-----------------------------------------");
        $this->info("Roles and Permissions:");
        $this->line("-----------------------------------------");

        Schema::disableForeignKeyConstraints();
        Permission::truncate();
        Role::truncate();

        if ($this->option('fresh')) {
            DB::table('role_has_permissions')->truncate();
            $this->info("Removed all previous assigned permissions to all roles!");
        }

        $rolePermissions = config('roles_and_permissions.role_permissions');
        $modules = config('roles_and_permissions.modules');
        $mapPermission = collect(config('roles_and_permissions.permissions_map'));


        foreach ($modules as $module => $actions) {
            foreach ($actions as $action) {
                $permissionName = $mapPermission[$action].'_'.$module;
                Permission::create(['name' => $permissionName]);
            }
        }

        $this->info("Default Permissions added!");

        foreach ($rolePermissions as $role => $modules) {
            $role = Role::create(['name' => $role]);

            $this->info("Manager Role Added!");

            foreach ($modules as $modName => $module) {
                foreach ($module['permissions'] as $permission) {
                    $permission = $mapPermission[$permission].'_'.$modName;
                    $role->givePermissionTo($permission);
                }
            }

            $this->info("Manager Permissions assigned!");
        }

        Schema::enableForeignKeyConstraints();
    }
}
