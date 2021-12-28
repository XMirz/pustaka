<?php

namespace Database\Seeders;

use App\Models\Member;
use App\Models\Student;
use Illuminate\Database\Seeder;

class MembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Member::factory(10)->create();
    }
}
