<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Employee;
use App\Models\User;
use App\Models\TrashCan;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Enums\SeperationTray;

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

        Employee::create([
            'uuid' => Str::uuid(),
            'name' => 'Daan Visseren',
            'email' => 'daan@projecttrash.nl',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        Employee::create([
            'uuid' => Str::uuid(),
            'name' => 'Guido Terstal',
            'email' => 'guido@projecttrash.nl',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        Employee::create([
            'uuid' => Str::uuid(),
            'name' => 'Pim Thijssen',
            'email' => 'pim@projecttrash.nl',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        Employee::create([
            'uuid' => Str::uuid(),
            'name' => 'Fons van der Veen',
            'email' => 'fons@projecttrash.nl',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        Employee::create([
            'uuid' => Str::uuid(),
            'name' => 'Sam Vos',
            'email' => 'sam@projecttrash.nl',
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

        $user = User::create([
            'uuid' => Str::uuid(),
            'name' => 'John Doe',
            'email' => 'doe@example.org',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'nfc_uid' => '906718937129',
        ]);

        $user->addMedia(resource_path('seeds/gPZwCbdS.jpg'))
            ->preservingOriginal()
            ->toMediaCollection('avatar', 'public');

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
            'name' => 'Chaudfontaine Mineraalwater',
            'seperation_tray' => SeperationTray::PMD,
            'information' => 'Plastic fles in pmd bak',
            'deposit_amount' => 15,
        ]);

        Product::create([
            'uuid' => Str::uuid(),
            'barcode' => '90162909',
            'name' => 'Redbull',
            'seperation_tray' => SeperationTray::PMD,
            'information' => 'Blik in pmd bak',
            'deposit_amount' => 15,
        ]);

        Product::create([
            'uuid' => Str::uuid(),
            'barcode' => '8710739200023',
            'name' => 'Originele kanjers stroopwafels',
            'seperation_tray' => SeperationTray::PMD,
            'information' => 'Verpakking in   pmd bak',
            'deposit_amount' => 15,
        ]);

        Product::create([
            'uuid' => Str::uuid(),
            'barcode' => '5449000238740',
            'name' => 'Fuze Tea',
            'seperation_tray' => SeperationTray::PMD,
            'information' => 'Plastic fles in pmd bak',
            'deposit_amount' => 15,
        ]);

        Product::create([
            'uuid' => Str::uuid(),
            'barcode' => '640522710850',
            'name' => 'Raspberry Pie Verpakking',
            'seperation_tray' => SeperationTray::Paper,
            'information' => 'Verpakking in   papieren bak',
        ]);

        Product::create([
            'uuid' => Str::uuid(),
            'barcode' => '8711000870228',
            'name' => 'Ice Macchiato',
            'seperation_tray' => SeperationTray::Paper,
            'information' => 'Dop mag in      plastic bak',
        ]);

        Product::create([
            'uuid' => Str::uuid(),
            'barcode' => '8718452119233',
            'name' => 'Citroën',
            'seperation_tray' => SeperationTray::GFT,
            'information' => 'Verpakking in   plastic bak',
        ]);

        Product::create([
            'uuid' => Str::uuid(),
            'barcode' => '8713300079189',
            'name' => 'Dubbel Drank',
            'seperation_tray' => SeperationTray::PMD,
            'information' => 'Verpakking in   plastic bak',
            'deposit_amount' => 15,
        ]);

        Product::create([
            'uuid' => Str::uuid(),
            'barcode' => '8713893009402',
            'name' => 'Appel',
            'seperation_tray' => SeperationTray::GFT,
            'information' => 'Verpakking in   gft bak',
        ]);

        Product::create([
            'uuid' => Str::uuid(),
            'barcode' => '8715600240030',
            'name' => 'Pepsi Max',
            'seperation_tray' => SeperationTray::PMD,
            'information' => 'Verpakking in   plastic bak',
        ]);

        Product::create([
            'uuid' => Str::uuid(),
            'barcode' => '8718449096554',
            'name' => 'Pepsi Max',
            'seperation_tray' => SeperationTray::PMD,
            'information' => 'Jumbo Mango & gauve vitamine drink',
        ]);
    }
}
