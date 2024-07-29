<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classrooms = ['1BE','2BE','3BE','4BE','5BE','6BE'];
        foreach($classrooms as $classroom){
            Classroom::factory()->create([
                'name' => $classroom
            ]);
        }
    }
}
