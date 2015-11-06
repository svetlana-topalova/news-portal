<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User, App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('RolesTableSeeder');
        $this->call('StatusesTableSeeder');

        $admin = User::create([
			'name' => 'Admin',
			'email' => 'admin@gmail.com',
			'password' => bcrypt('admin')
		]);
        $admin->roles()->attach([1]);
        
        $editor = User::create([
			'name' => 'Editor',
			'email' => 'editor@gmail.com',
			'password' => bcrypt('editor')
		]);
        $editor->roles()->attach(2);
        
        Model::reguard();
    }
}
