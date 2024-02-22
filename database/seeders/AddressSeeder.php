<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('addresses')->insert([
            [
                'user_id' => 1,
                'type' => 3,
                'is_default' => 1,
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'johndoe@mail.com',
                'contact' => '123-4567',
                'line_1' => 'Some random building number, at a random street',
                'line_2' => null,
                'city' => 'Bikini Bottom',
                'state' => 'Pacific Ocean',
                'zip_code' => null,
                'country' => 'Unknown',
                'created_at' => Carbon::now(),
            ],
            [
                'user_id' => 2,
                'type' => 3,
                'is_default' => 1,
                'first_name' => 'Jane',
                'last_name' => 'Doe',
                'email' => 'janedoe@mail.com',
                'contact' => '123-4567',
                'line_1' => 'Under a rock',
                'line_2' => null,
                'city' => 'Bikini Bottom',
                'state' => 'Pacific Ocean',
                'zip_code' => null,
                'country' => 'Unknown',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
