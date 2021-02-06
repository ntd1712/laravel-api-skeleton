<?php

namespace Database\Seeders;

use Bluemmb\Faker\PicsumPhotosProvider;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class DatabaseSeeder.
 */
class DatabaseSeeder extends Seeder
{
    /**
     * {@inheritDoc}
     *
     * @return mixed
     */
    public function __invoke(array $parameters = [])
    {
        $faker = Factory::create();
        $faker->addProvider(new PicsumPhotosProvider($faker));
        $this->container->instance('faker', $faker);

        return parent::__invoke();
    }

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        foreach (glob(__DIR__ . '/V1/*', GLOB_NOSORT) as $file) {
            /* @noinspection PhpIncludeInspection */
            include_once $file;
            $this->call(basename($file, '.php'));
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
