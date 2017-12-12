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
      $user = new User;
      $user->name = 'doe';
      $user->displayed_name = 'John Doe';
      $user->email = 'johndoe@example.com';
      $user->password = bcrypt('j0hnd03');
      $user->created_at = date('Y-m-d H:i:s');
      $user->updated_at = date('Y-m-d H:i:s');
      $user->save();

      $user = new User;
      $user->name = 'roe';
      $user->displayed_name = 'Jane Roe';
      $user->email = 'janeroe@example.com';
      $user->password = bcrypt('j4n3r03');
      $user->created_at = date('Y-m-d H:i:s');
      $user->updated_at = date('Y-m-d H:i:s');
      $user->save();
    }
}
