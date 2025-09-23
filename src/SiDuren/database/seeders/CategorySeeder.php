<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Pengumuman',
                'description' => 'Surat-surat yang terkait dengan pengumuman',
            ],
            [
                'name' => 'Undangan',
                'description' => 'Undangan rapat, koordinasi, dlsb.',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
