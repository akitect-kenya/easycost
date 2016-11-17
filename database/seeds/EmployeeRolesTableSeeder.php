<?php

use Illuminate\Database\Seeder;

class EmployeeRolesTableSeeder extends Seeder
{
    private $user_roles = [
        array(
            'email' => 'angela@unilever.com',
            'role' => 'administrator'
        ),

        array(
            'email' => 'accountant@unilever.com',
            'role' => 'accountant'
        ),

        array(
            'email' => 'kamausamuel11@gmail.com',
            'role' => 'accountant'
        ),
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->user_roles as $user_role) {
            \App\Models\Employee::where('email', $user_role['email'])
                                ->first()
                                ->attachRole(\App\Models\Role::where('name', $user_role['role'])->first());
        }
    }
}
