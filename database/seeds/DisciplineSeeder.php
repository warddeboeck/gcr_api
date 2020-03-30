<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DisciplineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('disciplines')->delete();
        DB::statement("ALTER TABLE disciplines AUTO_INCREMENT = 1;");
        DB::table('disciplines')->insert([
            1 => 
            [
                'name'                  =>  'Design',
                'created_at'            =>  Carbon::now(),
                'updated_at'            =>  Carbon::now(),
            ],
            2 => 
            [
                'name'                  =>  'Digital Craft',
                'created_at'            =>  Carbon::now(),
                'updated_at'            =>  Carbon::now(),
            ],
            3 => 
            [
                'name'                  =>  'Copywriting/scriptwriting',
                'created_at'            =>  Carbon::now(),
                'updated_at'            =>  Carbon::now(),
            ],
            4 => 
            [
                'name'                  =>  'Conceptual',
                'created_at'            =>  Carbon::now(),
                'updated_at'            =>  Carbon::now(),
            ],
            5 => 
            [
                'name'                  =>  'PR',
                'created_at'            =>  Carbon::now(),
                'updated_at'            =>  Carbon::now(),
            ],
            6 => 
            [
                'name'                  =>  'Social',
                'created_at'            =>  Carbon::now(),
                'updated_at'            =>  Carbon::now(),
            ]
        ]);
    }
}
