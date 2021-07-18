<?php

use Illuminate\Database\Seeder;

/**
 * Class PermissionsTableSeeder.
 */
class PermissionsTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $table = 'permissions';

        DB::table($table)->truncate();
        DB::table($table)->insert(
            [
                [
                    'name' => 'Backend.Account',
                    'description' => 'Allows you to manage users, roles and permissions.',
                    'not_use' => false,
                    'created_at' => $now = date('Y-m-d H:i:s'),
                    'app_key' => $key = $this->container['config']['app.key']
                ],
                [
                    'name' => 'Backend.Account.Permission',
                    'description' => 'Allows you to manage permissions.',
                    'not_use' => false,
                    'created_at' => $now,
                    'app_key' => $key
                ],
                [
                    'name' => 'Backend.Account.Role',
                    'description' => 'Allows you to manage roles.',
                    'not_use' => false,
                    'created_at' => $now,
                    'app_key' => $key
                ],
                [
                    'name' => 'Backend.Account.User',
                    'description' => 'Allows you to manage users.',
                    'not_use' => false,
                    'created_at' => $now,
                    'app_key' => $key
                ],
                [
                    'name' => 'Backend.System',
                    'description' => 'Allows you to manage audit trails, lookup values and settings.',
                    'not_use' => false,
                    'created_at' => $now,
                    'app_key' => $key
                ],
                [
                    'name' => 'Backend.System.Audit',
                    'description' => 'Allows you to manage audit trails.',
                    'not_use' => false,
                    'created_at' => $now,
                    'app_key' => $key
                ],
                [
                    'name' => 'Backend.System.Lookup',
                    'description' => 'Allows you to manage lookup values.',
                    'not_use' => false,
                    'created_at' => $now,
                    'app_key' => $key
                ],
                [
                    'name' => 'Backend.System.Setting',
                    'description' => 'Allows you to manage settings.',
                    'not_use' => false,
                    'created_at' => $now,
                    'app_key' => $key
                ]
            ]
        );
    }
}
