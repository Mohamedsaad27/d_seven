<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = [
            ['name_en' => 'Red', 'name_ar' => 'أحمر'],
            ['name_en' => 'Blue', 'name_ar' => 'أزرق'],
            ['name_en' => 'Green', 'name_ar' => 'أخضر'],
            ['name_en' => 'Yellow', 'name_ar' => 'أصفر'],
            ['name_en' => 'Black', 'name_ar' => 'أسود'],
            ['name_en' => 'White', 'name_ar' => 'أبيض'],
        ];

        foreach ($colors as $color) {
            Color::create($color);
        }
    }
}
