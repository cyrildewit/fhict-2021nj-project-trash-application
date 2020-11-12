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
            'barcode' => '5449000111678',
            'title' => 'Chaudfontaine Mineraalwater',
            // 'seperation_tray' => 'pmd',
            'seperation_tray' => 'gft',
            'information' => 'Plastic fles in pmd bak',
        ]);

        Product::create([
            'barcode' => '90162909',
            'title' => 'Redbull',
            'seperation_tray' => 'pmd',
            'information' => 'Blik in pmd bak',
        ]);

        Product::create([
            'barcode' => '8710739200023',
            'title' => 'Originele kanjers stroopwafels',
            'seperation_tray' => 'pmd',
            'information' => 'Verpakking in   pmd bak',
        ]);

        Product::create([
            'barcode' => '5449000238740',
            'title' => 'Fuze Tea',
            'seperation_tray' => 'pmd',
            'information' => 'Plastic fles in pmd bak',
        ]);

        Product::create([
            'barcode' => '640522710850',
            'title' => 'Raspberry Pie Verpakking',
            'seperation_tray' => 'paper',
            'information' => 'Verpakking in   papieren bak',
        ]);

        Product::create([
            'barcode' => '8711000870228',
            'title' => 'Ice Macchiato',
            'seperation_tray' => 'paper',
            'information' => 'Dop mag in      plastic bak',
        ]);

        Product::create([
            'barcode' => '8718452119233',
            'title' => 'Citroën',
            'seperation_tray' => 'gft',
            'information' => 'Verpakking in   plastic bak',
        ]);
    }
}
