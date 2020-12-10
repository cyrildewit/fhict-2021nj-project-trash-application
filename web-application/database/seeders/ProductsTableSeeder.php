<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Employee;
use Illuminate\Database\Seeder;
use App\Enums\SeperationTray;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'barcode' => '5449000111678',
            'name' => 'Chaudfontaine Mineraalwater',
            'seperation_tray' => SeperationTray::PMD,
            'information' => 'Plastic fles in pmd bak',
        ]);

        Product::create([
            'barcode' => '90162909',
            'name' => 'Redbull',
            'seperation_tray' => SeperationTray::PMD,
            'information' => 'Blik in pmd bak',
        ]);

        Product::create([
            'barcode' => '8710739200023',
            'name' => 'Originele kanjers stroopwafels',
            'seperation_tray' => SeperationTray::PMD,
            'information' => 'Verpakking in   pmd bak',
        ]);

        Product::create([
            'barcode' => '5449000238740',
            'name' => 'Fuze Tea',
            'seperation_tray' => SeperationTray::PMD,
            'information' => 'Plastic fles in pmd bak',
        ]);

        Product::create([
            'barcode' => '640522710850',
            'name' => 'Raspberry Pie Verpakking',
            'seperation_tray' => SeperationTray::Paper,
            'information' => 'Verpakking in   papieren bak',
        ]);

        Product::create([
            'barcode' => '8711000870228',
            'name' => 'Ice Macchiato',
            'seperation_tray' => SeperationTray::Paper,
            'information' => 'Dop mag in      plastic bak',
        ]);

        Product::create([
            'barcode' => '8718452119233',
            'name' => 'Citroën',
            'seperation_tray' => 'gft',
            'information' => 'Verpakking in   plastic bak',
        ]);

        Product::create([
            'barcode' => '8713300079189',
            'name' => 'Dubbel Drank',
            'seperation_tray' => SeperationTray::PMD,
            'information' => 'Verpakking in   plastic bak',
        ]);
    }
}
