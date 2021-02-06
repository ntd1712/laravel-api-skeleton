<?php

use Illuminate\Database\Seeder;

/**
 * Class LookupsTableSeeder.
 */
class LookupsTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $table = 'lookups';

        DB::table($table)->truncate();
        DB::table($table)->insert(
            [
                [
                    'group' => 'gender',
                    'name' => 'Male',
                    'value' => '1',
                    'sort_order' => 1,
                    'not_use' => false
                ],
                [
                    'group' => 'gender',
                    'name' => 'Female',
                    'value' => '0',
                    'sort_order' => 2,
                    'not_use' => false
                ]
            ]
        );
    }
}
