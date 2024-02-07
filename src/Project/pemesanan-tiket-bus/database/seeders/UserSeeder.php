<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'name' => 'Andy Sehtiawan',
                'email' => 'sektiawanandy1995@gmail.com',
                'password' => bcrypt('password'),
                'remember_token' => str()->random(10),
                'email_verified_at' => now(),
                'role' => RoleEnum::ADMIN->value,
            ],
        ])->each(fn ($user) => User::create($user));
    }
}
