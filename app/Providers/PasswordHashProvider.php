<?php

namespace App\Providers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;

class PasswordHashProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Hash::extend('custom', function ($value) {
            return password_hash(substr_replace(md5($value), "!%@!((&", 15, 0), PASSWORD_BCRYPT);
        });
    }
}
