<?php

namespace Database\Seeders;

use App\Models\Leasing;
use App\Models\Property;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LeasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $property = Property::where('title', 'Casa Exemplo')->first();
        $tenant = User::where('email', 'user@example.com')->first();

        Leasing::create([
            'id' => (string) Str::uuid(),
            'property_id' => $property->id,
            'tenant_id' => $tenant->id,
            'start_date' => Carbon::now()->subMonth(),
            'end_date' => Carbon::now()->addMonths(11),
            'monthly_rent' => $property->monthly_rent,
            'status' => 'ATIVO',
        ]);
    }
}
