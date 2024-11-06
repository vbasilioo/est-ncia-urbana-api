<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'user@example.com')->first();

        Address::create([
            'id' => (string) Str::uuid(),
            'user_id' => $user->id,
            'street' => 'Rua Exemplo',
            'city' => 'Cidade Exemplo',
            'state' => 'Estado Exemplo',
            'zip_code' => '12345-678',
            'country' => 'BRASIL',
        ]);
    }
}
