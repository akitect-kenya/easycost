<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Predefined roles
     *
     * @var array
     */
    private $roles = [
        array(
            'name' => 'administrator',
            'display_name' => 'Administrator',
            'description' => 'This is an administrator.'
        ),

        array(
            'name' => 'accountant',
            'display_name' => 'Accountant',
            'description' => 'This is an accountant.'
        )
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->roles as $role) {
            \App\Models\Role::create($role);
        }
    }
}
