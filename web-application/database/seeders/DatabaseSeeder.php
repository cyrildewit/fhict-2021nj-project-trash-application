<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Employee;
use App\Models\TrashCan;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->run(EmployeesTableSeeder::class);
        // $this->run(ProductsTableSeeder::class);

        Employee::create([
            'uuid' => Str::uuid(),
            'name' => 'Cyril de Wit',
            'email' => 'cyril@projecttrash.nl',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        TrashCan::create([
            'uuid' => Str::uuid(),
            'name' => 'Prullenbak Schootsestraat 1',
            'location' => 'Schootsestraat 102, Eindhoven',
            'latitude' => 51.44186,
            'longtitude' => 5.4793,
            'customer_id' => 1,
        ]);

        TrashCan::create([
            'uuid' => Str::uuid(),
            'name' => 'Prullenbak Schootsestraat 2',
            'location' => 'Schootsestraat 102, Eindhoven',
            'latitude' => 51.44186,
            'longtitude' => 5.48113,
            'customer_id' => 1,
        ]);

        TrashCan::create([
            'uuid' => Str::uuid(),
            'name' => 'Prullenbak PSV stadium 1',
            'location' => 'Schootsestraat 102, Eindhoven',
            'latitude' => 51.4415,
            'longtitude' => 5.46969,
            'customer_id' => 1,
        ]);

        TrashCan::create([
            'uuid' => Str::uuid(),
            'name' => 'Strijp',
            'location' => 'Schootsestraat 102, Eindhoven',
            'latitude' => 51.44069,
            'longtitude' => 5.45467,
            'customer_id' => 1,
        ]);

        // TrashCan::create([
        //     'uuid' => Str::uuid(),
        //     'name' => 'Strijp',
        //     'location' => 'Schootsestraat 102, Eindhoven',
        //     'latitude' => 51.91842,
        //     'longtitude' => 4.48234,
        //     'customer_id' => 3,
        // ]);

        TrashCan::create([
            'uuid' => Str::uuid(),
            'name' => 'Strijp',
            'location' => 'Schootsestraat 102, Eindhoven',
            'latitude' => 51.45144,
            'longtitude' => 5.48181,
            'customer_id' => 2,
        ]);

        TrashCan::create([
            'uuid' => Str::uuid(),
            'name' => 'Strijp',
            'location' => 'Schootsestraat 102, Eindhoven',
            'latitude' => 51.45173,
            'longtitude' => 5.47935,
            'customer_id' => 2,
        ]);

        // for ($i = 0; $i < 200; $i++) {
        //     TrashCan::create([
        //         'uuid' => Str::uuid(),
        //         'name' => 'Prullenbak #' . $i,
        //         'location' => 'Berenweg 2, Eindhoven',
        //         'latitude' => 51.44186,
        //         'longtitude' => 5.4793,
        //     ]);
        // }

        Customer::create([
            'uuid' => Str::uuid(),
            'name' => 'Gemeente Eindhoven',
            'uuid' => Str::uuid(),
            'latitude' => 51.43481,
            'longtitude' => 5.4913,
            'zoom' => 12,
        ]);

        Customer::create([
            'uuid' => Str::uuid(),
            'name' => 'Fontys Hogeschool',
            'uuid' => Str::uuid(),
            'latitude' => 51.45139,
            'longtitude' => 5.48367,
            'zoom' => 16,
        ]);

        Product::create([
            'uuid' => Str::uuid(),
            'barcode' => '5449000111678',
            'title' => 'Chaudfontaine Mineraalwater',
            'seperation_tray' => 'pmd',
            'information' => 'Plastic fles in pmd bak',
            'deposit_amount' => 15,
        ]);

        Product::create([
            'uuid' => Str::uuid(),
            'barcode' => '90162909',
            'title' => 'Redbull',
            'seperation_tray' => 'pmd',
            'information' => 'Blik in pmd bak',
            'deposit_amount' => 15,
        ]);

        Product::create([
            'uuid' => Str::uuid(),
            'barcode' => '8710739200023',
            'title' => 'Originele kanjers stroopwafels',
            'seperation_tray' => 'pmd',
            'information' => 'Verpakking in   pmd bak',
            'deposit_amount' => 15,
        ]);

        Product::create([
            'uuid' => Str::uuid(),
            'barcode' => '5449000238740',
            'title' => 'Fuze Tea',
            'seperation_tray' => 'pmd',
            'information' => 'Plastic fles in pmd bak',
            'deposit_amount' => 15,
        ]);

        Product::create([
            'uuid' => Str::uuid(),
            'barcode' => '640522710850',
            'title' => 'Raspberry Pie Verpakking',
            'seperation_tray' => 'paper',
            'information' => 'Verpakking in   papieren bak',
        ]);

        Product::create([
            'uuid' => Str::uuid(),
            'barcode' => '8711000870228',
            'title' => 'Ice Macchiato',
            'seperation_tray' => 'paper',
            'information' => 'Dop mag in      plastic bak',
        ]);

        Product::create([
            'uuid' => Str::uuid(),
            'barcode' => '8718452119233',
            'title' => 'Citroën',
            'seperation_tray' => 'gft',
            'information' => 'Verpakking in   plastic bak',
        ]);

        Product::create([
            'uuid' => Str::uuid(),
            'barcode' => '8713300079189',
            'title' => 'Dubbel Drank',
            'seperation_tray' => 'pmd',
            'information' => 'Verpakking in   plastic bak',
            'deposit_amount' => 15,
        ]);

        Product::create([
            'uuid' => Str::uuid(),
            'barcode' => '8713893009402',
            'title' => 'Appel',
            'seperation_tray' => 'gft',
            'information' => 'Verpakking in   gft bak',
        ]);

        Product::create([
            'uuid' => Str::uuid(),
            'barcode' => '8715600240030',
            'title' => 'Pepsi Max',
            'seperation_tray' => 'pmd',
            'information' => 'Verpakking in   plastic bak',
        ]);

        Product::create([
            'uuid' => Str::uuid(),
            'barcode' => '8718449096554',
            'title' => 'Pepsi Max',
            'seperation_tray' => 'pmd',
            'information' => 'Jumbo Mango & gauve vitamine drink',
        ]);
    }
}
