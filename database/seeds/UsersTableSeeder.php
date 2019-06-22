<?php
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //import library faker
      $faker = Faker::create();
      //how many data do u want to seed?
      $limit = 10;
      $password = "12345";

      //empty the table and reset auto increment
      DB::table('users')->truncate();

      for($i=0; $i< $limit; $i++){
        $salt = Str::random(10);
        $hashPass = md5($password.$salt);

        DB::table('users')->insert([
          'email' => $faker->unique()->safeEmail,
          'salt' => $salt,
          'password' => $hashPass,
          'tokenLogin' => '',
          'createdBy' => 'Seeder'
        ]);
      }
    }
}
