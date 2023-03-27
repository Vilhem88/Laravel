<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new Client();
        $client->name = 'Client 1';
        $client->address = 'Client address 1';
        $client->phone = '123456789';
        $client->save();

        $client1 = new Client();
        $client1->name = 'Client 2';
        $client1->address = 'Client address 2';
        $client1->phone = '222222222';
        $client1->save();
    
    }
}
