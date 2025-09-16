<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Student;
use App\Models\Track;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $courses = Course::factory(10)->create();
        
        foreach ($courses as $course) {
            $course->students()->attach(
                Student::inRandomOrder()->limit(5)->pluck('id')
            );
            
            $course->tracks()->attach(
                Track::inRandomOrder()->limit(2)->pluck('id')
            );
        }
    }
}