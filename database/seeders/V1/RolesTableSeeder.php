<?php

use Illuminate\Database\Seeder;

/**
 * Class RolesTableSeeder.
 */
class RolesTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $table = 'roles';

        DB::table($table)->truncate();
        DB::table($table)->insert(
            [
                [
                    'name' => 'Administrator',
                    'description' => 'Members of the Administrator role have the largest amount of default permissions'
                        . ' and the ability to change their own permissions.',
                    'not_use' => false,
                    'created_at' => $now = date('Y-m-d H:i:s'),
                    'app_key' => $key = $this->container['config']['app.key']
                ],
                [
                    'name' => 'Guest',
                    'description' => null,
                    'not_use' => false,
                    'created_at' => $now,
                    'app_key' => $key
                ],
                [
                    'name' => 'Power User',
                    'description' => null,
                    'not_use' => false,
                    'created_at' => $now,
                    'app_key' => $key
                ],
                [
                    'name' => 'User',
                    'description' => null,
                    'not_use' => false,
                    'created_at' => $now,
                    'app_key' => $key
                ]
            ]
        );
    }
}
