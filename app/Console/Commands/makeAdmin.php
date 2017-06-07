<?php

namespace huerta\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Auth\Events\Registered;
use huerta\User;

class makeAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add admin user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->ask('name');
        $email = $this->ask('email');
        $password = $this->ask('password');

        User::create([
                'name' => $name,
                'email' => $email,
                'password' => bcrypt($password),
                'role' => 3,
        ]);
    }
}
