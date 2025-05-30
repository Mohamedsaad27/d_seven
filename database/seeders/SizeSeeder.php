<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Size;
class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sizes = [
            ['size' => 'Small'],
            ['size' => 'Medium'],
            ['size' => 'Large'],
            ['size' => 'Extra Large'],
        ];

        foreach ($sizes as $size) {
            Size::create($size);
        }
    }
}
