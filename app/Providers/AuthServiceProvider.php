<?php

namespace App\Providers;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider {
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot() {
        $this->registerPolicies();

        Gate::before(function ($user, $ability) {
            return $user->hasRole('super-admin') ? true : null;
        });

        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->subject('Verify Email Address')
                ->line('Click the button below to verify your email address.')
                ->line('Or')
                ->line(new HtmlString('Use This Code: <strong>' . auth()->user()->verificationToken->token . '</strong>'))
                ->action('Verify Email Address', $url);
        });
    }
}
