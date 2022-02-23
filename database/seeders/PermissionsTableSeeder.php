<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Permission Types
         *
         */
        $Permissionitems = [
            [
                'name'        => 'Can Manage Users',
                'slug'        => 'view.manage.users',
                'description' => 'Can manage users',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can View Roles',
                'slug'        => 'view.roles',
                'description' => 'Can view roles',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can View Users',
                'slug'        => 'view.users',
                'description' => 'Can view users',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Verify Videos',
                'slug'        => 'can.verify.videos',
                'description' => 'Can verify videos',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Manage Payouts',
                'slug'        => 'can.manage.payouts',
                'description' => 'Can manage payouts',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Manage Contents',
                'slug'        => 'can.manage.contents',
                'description' => 'Can manage contents',
                'model'       => 'Permission',
            ],
        ];

        /*
         * Add Permission Items
         *
         */
        foreach ($Permissionitems as $Permissionitem) {
            $newPermissionitem = config('roles.models.permission')::where('slug', '=', $Permissionitem['slug'])->first();
            if ($newPermissionitem === null) {
                $newPermissionitem = config('roles.models.permission')::create([
                    'name'          => $Permissionitem['name'],
                    'slug'          => $Permissionitem['slug'],
                    'description'   => $Permissionitem['description'],
                    'model'         => $Permissionitem['model'],
                ]);
            }
        }
    }
}
