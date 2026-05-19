<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

class NotificationServiceProvider extends ServiceProvider
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
        // Partager les notifications non lues avec toutes les vues
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $notificationsNonLues = Notification::where('user_id', Auth::id())
                    ->where('lue', false)
                    ->count();

                $view->with('notificationsNonLues', $notificationsNonLues);
            }
        });
    }
}
