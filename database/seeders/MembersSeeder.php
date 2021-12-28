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
        Student::factory(10)->create();
        $students = Student::select(['id'])->get();
        foreach ($students as $s) {
            Member::create([
                'student_id' => $s->id
            ]);
        }
    }
}
