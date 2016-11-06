<?php

use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Employee details
     *
     * @var array
     */
    private $employeeDetails = [
        array(
            'name' => 'Angela Gichuki',
            'email' => 'angela@unilever.com',
            'password' => 'password'
        ),

        array(
            'name' => 'Accountant one',
            'email' => 'accountant@unilever.com',
            'password' => 'password'
        )
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->employeeDetails as $employeeDetail) {
            \App\Models\Employee::create($employeeDetail);
        }
    }
}