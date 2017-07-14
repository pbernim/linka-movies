<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon ;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
                [
                    'name' => "Admin user", 
                    'email' => "linka@gmail.com", 
                    'password' => bcrypt('secret'),
                    'created_at' => Carbon::now()
                ]
        );

        foreach ($users as $user)
        {
            DB::table('users')->insert($user);
        }
    }
}
