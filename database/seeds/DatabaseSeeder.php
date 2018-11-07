<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(escuelaempresa\Student::class,20)->create();
        factory(escuelaempresa\Company::class,10)->create();
        factory(escuelaempresa\Grade::class,3)->create();
    }
}
