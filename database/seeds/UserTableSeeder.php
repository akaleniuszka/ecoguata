<?php

use App\Models\Status;
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Status::truncate();

        factory(User::class)->create(['email' => 'prueba@prueba.com']);
        factory(Status::class, 10)->create(['email' => 'prueba@prueba.com']);
    }
}
