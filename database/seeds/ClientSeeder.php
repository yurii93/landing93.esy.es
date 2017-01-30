<?php

use Illuminate\Database\Seeder;

use App\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
                [
                    'name' => 'Iphone',
                    'images' => 'client_logo1.png',
                ],
                [
                    'name' => 'Android',
                    'images' => 'client_logo2.png',
                ],
                [
                    'name' => 'Microsoft',
                    'images' => 'client_logo5.png',
                ],
                [
                    'name' => 'Samsung 1',
                    'images' => 'client_logo3.png',
                ],
                [
                    'name' => 'Samsung 2',
                    'images' => 'client_logo4.png',
                ],
            ]);
    }
}
