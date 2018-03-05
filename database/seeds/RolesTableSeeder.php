<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{

	public function run(){
	    App\Roles::create(array(
	        'name' => 'admin',
	        'created_by' => 1,
	        'updated_by' => 1
	    ));
	    App\Roles::create(array(
	        'name' => 'visitor',
	        'created_by' => 1,
	        'updated_by' => 1
	    ));
	}

}
?>