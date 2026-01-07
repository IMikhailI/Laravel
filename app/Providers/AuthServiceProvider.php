<?php

namespace App\Providers;

use App\Models\Room;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Gate::define('destroy-room', function (User $user, Room $room) {
            return $user->is_admin || $room->price < 2000;
        });

        Gate::define('edit-room', function (User $user, Room $room) {
            return $user->is_admin;
        });
    }
}
