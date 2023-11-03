<?php

namespace App\Console\Commands;

use App\Models\Admin;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SyncPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sync-permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $permissions = config('permission.permissions');

        foreach ($permissions as $set) {
            foreach ($set as $permission) {
                Permission::findOrCreate($permission);
            }
        }

        Role::findByName('Super Admin')->syncPermissions(Permission::all());
    }
}
