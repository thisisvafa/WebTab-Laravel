<?php

namespace App\Providers;

use App\Repositories\Comments\CommentsInterface;
use App\Repositories\Comments\CommentsRepository;
use App\Repositories\Users\UsersInterface;
use App\Repositories\Users\UsersRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UsersInterface::class, UsersRepository::class);
        $this->app->bind(CommentsInterface::class, CommentsRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
