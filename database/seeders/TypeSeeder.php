<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['Esercizio', 'Progetto'];
        foreach ($types as $type) {
            
            $db_type = new Type();

            $db_type->name = $type;
            $db_type->slug = Str::of($type)->slug();

            $db_type->save();

        }
    }
}
