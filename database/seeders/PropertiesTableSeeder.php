<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PropertiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'user@example.com')->first();
        $address = Address::where('user_id', $user->id)->first();

        Property::create([
            'id' => (string) Str::uuid(),
            'user_id' => $user->id,
            'address_id' => $address->id,
            'title' => 'Casa Exemplo',
            'description' => 'Uma bela casa de exemplo.',
            'monthly_rent' => 1500.00,
            'number_of_rooms' => 3,
            'number_of_bathrooms' => 2,
            'status' => 'DISPONÍVEL',
        ]);
    }
}
