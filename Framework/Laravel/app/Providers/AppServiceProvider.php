<?php

namespace App\Providers;

use App\Repositories\Connection;
use App\Repositories\CVRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;
use PhpOop\Core\Repository\Auth\MemberRepositoryInterface;
use PhpOop\Core\Repository\ConnectionInterface;
use PhpOop\Core\Repository\CurriculumVitae\CVRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    public array $bindings = [
        MemberRepositoryInterface::class => UserRepository::class,
        CVRepositoryInterface::class => CVRepository::class,
        ConnectionInterface::class => Connection::class
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
