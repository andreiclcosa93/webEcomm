<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Staff;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
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
    public function boot()
    {
        $this->registerPolicies();

        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->view('front.emails.verify-email', ['url' => $url])
                ->subject('account validation')
                ->line('click on the button to validate the account')
                ->action('validate the account: ', $url);
        });

        //gate manager
        Gate::define('manager', function(Staff $staff) {
            return $staff->type == 'manager';
        });
    }
}
