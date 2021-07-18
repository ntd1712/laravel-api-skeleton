<?php

use Illuminate\Database\Seeder;

/**
 * Class UsersRolesTableSeeder.
 */
class UsersRolesTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $table = 'users_roles';

        DB::table($table)->truncate();
        DB::table($table)->insert(
            [
                [
                    'user_id' => 1,
                    'role_id' => 1,
                    'is_primary' => true
                ],
                [
                    'user_id' => 2,
                    'role_id' => 3,
                    'is_primary' => true
                ]
            ]
        );
    }
}
