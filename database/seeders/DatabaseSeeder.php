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
            'barcode' => '05449000111678',
            'title' => 'Chaudfontaine Mineraalwater',
            'seperation_tray' => 'pmd',
        ]);

        Product::create([
            'barcode' => '8710255100180',
            'title' => 'IAMS Delights Senior met Kip in Saus',
            'seperation_tray' => 'pmd',
        ]);

        Product::create([
            'barcode' => '8710496977541',
            'title' => 'De Ruijter - Vlokfeest',
            'seperation_tray' => 'pmd',
        ]);

        Product::create([
            'barcode' => '8710391936919',
            'title' => 'Venz - Chocolade Hagelslag',
            'seperation_tray' => 'pmd',
        ]);
    }
}
