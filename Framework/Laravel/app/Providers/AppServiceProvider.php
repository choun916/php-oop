<?php

namespace App\Providers;

use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;
use PhpOop\Core\Repository\Auth\MemberRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    public array $bindings = [
        MemberRepositoryInterface::class => UserRepository::class
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
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
