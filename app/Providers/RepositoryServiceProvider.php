<?php

namespace App\Providers;

use App\Repositories\ChatRoomMessageRepository;
use App\Repositories\ChatRoomRepository;
use App\Repositories\CodeRepository;
use App\Repositories\InboxRepository;
use App\Repositories\Interfaces\ChatRoomMessageRepositoryInterface;
use App\Repositories\Interfaces\ChatRoomRepositoryInterface;
use App\Repositories\Interfaces\CodeRepositoryInterface;
use App\Repositories\Interfaces\InboxRepositoryInterface;
use App\Repositories\Interfaces\OnlineRepositoryInterface;
use App\Repositories\Interfaces\RequestRepositoryInterface;
use App\Repositories\Interfaces\ThreadQuestionRepositoryInterface;
use App\Repositories\Interfaces\ThreadRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\OnlineRepository;
use App\Repositories\RequestRepository;
use App\Repositories\ThreadQuestionRepository;
use App\Repositories\ThreadRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            RequestRepositoryInterface::class,
            RequestRepository::class
        );

        $this->app->singleton(
            CodeRepositoryInterface::class,
            CodeRepository::class
        );

        $this->app->singleton(
            UserRepositoryInterface::class,
            UserRepository::class
        );

        $this->app->singleton(
            ChatRoomRepositoryInterface::class,
            ChatRoomRepository::class
        );

        $this->app->singleton(
            ChatRoomMessageRepositoryInterface::class,
            ChatRoomMessageRepository::class
        );

        $this->app->singleton(
            OnlineRepositoryInterface::class,
            OnlineRepository::class
        );

        $this->app->singleton(
            InboxRepositoryInterface::class,
            InboxRepository::class
        );

        $this->app->singleton(
            ThreadRepositoryInterface::class,
            ThreadRepository::class
        );

        $this->app->singleton(
            ThreadQuestionRepositoryInterface::class,
            ThreadQuestionRepository::class
        );
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
