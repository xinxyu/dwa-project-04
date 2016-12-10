<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # email, name, and passwords of pre-defined users
        $users = [
            ['jill@harvard.edu','jill','helloworld'],
            ['jamal@harvard.edu','jamal','helloworld'],
            ['xxy762@g.harvard.edu','xin','helloworld']
        ];

        # Get existing users to prevent duplicates
        $existingUsers = User::all()->keyBy('email')->toArray();

        foreach($users as $user) {

            # If the user does not already exist, add them
            if(!array_key_exists($user[0],$existingUsers)) {
                $user = User::create([
                    'email' => $user[0],
                    'name' => $user[1],
                    'password' => Hash::make($user[2]),
                    'activated' => 1 # activate the user so no email confirmation is required
                ]);
            }
        }
    }
}
