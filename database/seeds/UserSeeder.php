<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $limit = 500;
        $customers = [];
        for ($i = 0; $i < $limit; $i++) {
            $customers[$i] = [
            'name' => 'learn'.$i,
            'email' => 'learn'.$i.'@gmail.com',
            'phone' => $faker->phoneNumber,
            'password' => bcrypt(12345678)
            ];
        }
        DB::table('users')->insert($customers);
    }
}
