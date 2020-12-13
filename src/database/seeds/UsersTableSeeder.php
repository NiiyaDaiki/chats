<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create(
            [
                'email' => 'takemi@gmail.com',
                'name' => '武見 妙'
            ]
        );
        factory(User::class)->create(
            [
                'email' => 'hero@gmail.com',
                'name' => '主人公'
            ]
        );
        factory(User::class, 3)->create();
    }
}
