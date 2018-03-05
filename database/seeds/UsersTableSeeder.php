<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{

	public function run(){
	    App\Users::create(array(
			'username' => 'sherlock',
	        'email'    => 'sherlock@gmail.com',
	        'password' => Hash::make('elementary'),
	        'created_by' => 1,
	        'updated_by' => 1
	    ));

	}

}
?>