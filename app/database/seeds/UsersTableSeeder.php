<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();


        $users = array(
            array(
                'username'      => 'laravel4noobs',
                'password'   => Hash::make('lArav314n00b5'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ) ,
                        array(
                'username'      => 'user1',
                'password'   => Hash::make('user1'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            )  , 
             array(
                'username'      => 'user2',
                'password'   => Hash::make('user2'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ) 
        );

        DB::table('users')->insert( $users );
    }

}
