<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'barcode' => '3038589249',
            'title' => 'Test 1',
            'description' => 'Something or ..sdfjskdfj skfdk .',
        ]);

        Product::create([
            'barcode' => '44354535',
            'title' => 'Test 2',
            'description' => 'Something or ..sdfjskdfj skfdk .',
        ]);

        Product::create([
            'barcode' => '34543543553',
            'title' => 'Test 3',
            'description' => 'Something or ..sdfjskdfj skfdk .',
        ]);
    }
}
