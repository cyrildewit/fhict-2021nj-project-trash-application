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
            'barcode' => '8710908927799',
            'title' => 'Cup a Soup - Thaise pittige kip',
            'description' => 'Lorem ipsum',
        ]);

        Product::create([
            'barcode' => '8710255100180',
            'title' => 'IAMS Delights Senior met Kip in Saus',
            'description' => 'Lorem ipsum',
        ]);

        Product::create([
            'barcode' => '8710496977541',
            'title' => 'De Ruijter - Vlokfeest',
            'description' => 'Lorem ipsum',
        ]);

        Product::create([
            'barcode' => '8710391936919',
            'title' => 'Venz - Chocolade Hagelslag',
            'description' => 'Lorem ipsum',
        ]);
    }
}
