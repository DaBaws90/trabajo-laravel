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
        factory(escuelaempresa\User::class)->create(['name'=> 'Admin','email' => 'admin@admin.com']);
        factory(escuelaempresa\Student::class,30)->create();
        factory(escuelaempresa\Company::class,20)->create();
        factory(escuelaempresa\Grade::class,6)->create();
        factory(escuelaempresa\Petition::class,50)->create();
        factory(escuelaempresa\Study::class,50)->create();
    }
}
