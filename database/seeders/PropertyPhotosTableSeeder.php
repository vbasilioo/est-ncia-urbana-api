<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\PropertyPhoto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PropertyPhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $property = Property::where('title', 'Casa Exemplo')->first();

        $types = ['frontal', 'banheiro', 'cozinha', 'quarto', 'sala', 'área_externa', 'garagem', 'jardim', 'varanda'];
        foreach ($types as $type) {
            PropertyPhoto::create([
                'id' => (string) Str::uuid(),
                'property_id' => $property->id,
                'path' => "images/{$type}.jpg",
                'type' => $type,
            ]);
        }
    }
}
