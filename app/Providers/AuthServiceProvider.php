<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //define gate
        Gate::define('admin_manager','App\Policies\AdminPolicy@adminManager');
        Gate::define('can_news_category', 'App\Policies\AdminPolicy@categoryNewsManager');
        Gate::define('can_news', 'App\Policies\AdminPolicy@newsManager');
        Gate::define('can_contact', 'App\Policies\AdminPolicy@contactManager');
        Gate::define('can_question', 'App\Policies\AdminPolicy@questionManager');
        Gate::define('can_setting', 'App\Policies\AdminPolicy@settingManager');
        Gate::define('can_delete_question', 'App\Policies\AdminPolicy@deleteQuestionManager');
    }
}
