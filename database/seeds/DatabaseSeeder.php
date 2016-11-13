<?php

require_once('EmployeesTableSeeder.php');
require_once('EmployeeRolesTableSeeder.php');
require_once('GoodsTableSeeder.php');
require_once('RolesTableSeeder.php');

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(RolesTableSeeder::class);
         $this->call(EmployeesTableSeeder::class);
         $this->call(EmployeeRolesTableSeeder::class);
         $this->call(GoodsTableSeeder::class);
    }
}
