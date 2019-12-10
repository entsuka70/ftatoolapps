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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
      $this->registerPolicies();

      // 開発者のみ許可
      Gate::define('admin-only', function ($user) {
        return ($user->role == 'admin-only');
      });
      // ユーザーのみ許可
      Gate::define('login-user', function ($user) {
        return ($user->role == 'login-user');
      });
      // ゲスト(ログインなし)に許可
      // Gate::define('guest-general', function ($user) {
      //   return ($user->role > == 3);
      // });
    }
}
