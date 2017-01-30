<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(PageSeeader::class);
        //$this->call(PortfolioSeeder::class);
        $this->call(ClientSeeder::class);
    }
}
