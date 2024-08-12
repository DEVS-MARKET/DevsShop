<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CreateNewUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ds:create-admin {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new admin user.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $password = Str::random(16);
        $user = User::create([
            'name' => $name,
            'password' => bcrypt($password),
        ]);

        $this->info("User {$user->name} created successfully.");
        $this->info("Password: {$password}");
    }
}
