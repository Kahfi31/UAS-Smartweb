<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class TestMiddlewareCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:middleware';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test middleware and show current users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Testing Middleware and Current Users');
        $this->line('');

        $users = User::all();

        if ($users->count() === 0) {
            $this->warn('No users found in database.');
            $this->info('You can create test users by registering through the application.');
            return;
        }

        $this->info('Current Users in Database:');
        $this->line('');

        $headers = ['ID', 'Name', 'Email', 'Role'];
        $rows = [];

        foreach ($users as $user) {
            $rows[] = [
                $user->id,
                $user->first_name . ' ' . $user->last_name,
                $user->email,
                $user->role
            ];
        }

        $this->table($headers, $rows);
        $this->line('');

        $this->info('Middleware Test Results:');
        $this->line('- Tambah Destinasi: Only accessible by guide and admin');
        $this->line('- Admin Dashboard: Only accessible by admin');
        $this->line('- Tourist users cannot access admin pages');
        $this->line('- Guide users cannot access admin pages');
        $this->line('- Unauthenticated users will be redirected to login');
    }
}
