<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\DetailSource;
use App\Models\Product;
use App\Models\ProductDetail;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     * @throws \Exception
     */
    public function run()
    {
        Contact::factory(20)->create();

        try {

            \App\Models\User::factory(1)->create([
                'name' => 'Kristin',
                'email' => 'kristin@admin.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('kristin!147852369')
            ]);
/*            \App\Models\User::factory(1)->create([
                'name' => 'Super Admin',
                'email' => 'super@admin.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('Pa$$w0rd!')
            ]);
            \App\Models\User::factory(1)->create([
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('admin.2022!')
            ]);*/
        }catch (\Exception $exception){
            echo "Admin Kullanıcıları zaten eklenmiş!\n";
        }
    }
}
