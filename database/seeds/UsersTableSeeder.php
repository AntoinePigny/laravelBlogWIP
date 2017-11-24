<?php

use Illuminate\Database\Seeder;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Disabled Foreign Key');
        Schema::disableForeignKeyConstraints();
        $this->command->info('Truncated User Table');
        DB::table('users')->truncate();
        $this->command->info('Enabled Foreign Key');
        Schema::enableForeignKeyConstraints();

        DB::table('users')->insert([
            'firstname' => 'admin',
            'lastname' => 'admin',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('0000'),
            'status' => 1
        ]);
        $this->command->info('User "admin" created with password 0000');


        factory(App\User::class, 499)->create();
        $this->command->info('Users seeding completed!');



    }
}
