<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(User::class)->create(
            [
                'email' => 'niiya@gmail.com',
                'name' => 'Niiya'
            ]
        );
        factory(User::class)->create(
            [
                'email' => 'yasumura@gmail.com',
                'name' => 'Yasumura'
            ]
        );
        factory(User::class)->create(
            [
                'email' => 'tsunematsu@gmail.com',
                'name' => 'Tsunematsu'
            ]
        );
    }
}
