<?php

use Illuminate\Database\Seeder;

/**
 * Class RolesPermissionsTableSeeder.
 */
class RolesPermissionsTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $table = 'roles_permissions';

        DB::table($table)->truncate();
        DB::table($table)->insert(
            [
                [
                    'role_id' => 1,
                    'permission_id' => 1
                ],
                [
                    'role_id' => 1,
                    'permission_id' => 2
                ],
                [
                    'role_id' => 1,
                    'permission_id' => 3
                ],
                [
                    'role_id' => 1,
                    'permission_id' => 4
                ],
                [
                    'role_id' => 1,
                    'permission_id' => 5
                ],
                [
                    'role_id' => 1,
                    'permission_id' => 6
                ],
                [
                    'role_id' => 1,
                    'permission_id' => 7
                ],
                [
                    'role_id' => 1,
                    'permission_id' => 8
                ],
                [
                    'role_id' => 3,
                    'permission_id' => 1
                ],
                [
                    'role_id' => 3,
                    'permission_id' => 4
                ],
                [
                    'role_id' => 3,
                    'permission_id' => 5
                ],
                [
                    'role_id' => 3,
                    'permission_id' => 6
                ],
                [
                    'role_id' => 3,
                    'permission_id' => 8
                ]
            ]
        );
    }
}
