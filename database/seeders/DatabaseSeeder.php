<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $staff = new User();
        $staff->name = 'Hafez Almirza';
        $staff->username = 'xmirz';
        $staff->email = "x@x.com";
        $staff->password = Hash::make('x');
        $staff->save();

        $this->call([BooksSeeder::class]);
        $this->call([MembersSeeder::class]);
        $this->call([BorrowingsSeeder::class]);
    }
}
