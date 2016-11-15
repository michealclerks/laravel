<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('users')->delete();

        $users = array(
                ['name' => 'micheal clerks', 'email' => 'michealclerks@gmail.com', 'password' => Hash::make('secret')],
                ['name' => 'harold ura', 'email' => 'xxx@gmail.com', 'password' => Hash::make('secret')]
        );
            
        
        foreach ($users as $user)
        {
            User::create($user);
        }

        Model::reguard();
    }
}
