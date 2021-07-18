<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

/**
 * Class UsersTableSeeder.
 */
class UsersTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        /* @var \Faker\Generator $faker */
        $faker = $this->container['faker'];
        $table = 'users';

        DB::table($table)->truncate();
        DB::table($table)->insert(
            [
                [
                    'name' => 'sysadmin',
                    'email' => $faker->unique()->safeEmail,
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'remember_token' => $random = Str::random(10),
                    'profile' => json_encode(
                        [
                            'DisplayName' => $faker->name,
                            'Photo' => $faker->imageUrl(),
                            'About' => $faker->text
                        ]
                    ),
                    'not_use' => false,
                    'created_at' => $now = date('Y-m-d H:i:s'),
                    'app_key' => $key = $this->container['config']['app.key']
                ],
                [
                    'name' => 'demo',
                    'email' => $faker->unique()->safeEmail,
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                    'remember_token' => $random,
                    'profile' => json_encode(
                        [
                            'DisplayName' => $faker->name,
                            'Photo' => $faker->imageUrl(),
                            'About' => $faker->text
                        ]
                    ),
                    'not_use' => false,
                    'created_at' => $now,
                    'app_key' => $key
                ]
            ]
        );
    }
}
