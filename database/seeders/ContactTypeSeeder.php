<?php

namespace Database\Seeders;

use App\Models\ContactType;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time = Carbon::now()->toDateTimeString();

        $contactTypes = [
            ['title' => 'Mobile', 'created_at' => $time, 'updated_at' => $time],
            ['title' => 'Telephone', 'created_at' => $time, 'updated_at' => $time],
            ['title' => 'Email', 'created_at' => $time, 'updated_at' => $time],
        ];

        DB::table('contact_types')->insert($contactTypes);
    }
}
