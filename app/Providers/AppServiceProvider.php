<?php

namespace App\Providers;

use App\Services\AuthService;
use App\Services\CodeService;
use App\Services\UserService;
use App\Services\InboxService;
use App\Services\OnlineService;
use App\Services\ThreadService;
use App\Services\RequestService;
use App\Services\ChatRoomService;
use App\Services\ThreadQuestionService;
use Illuminate\Support\ServiceProvider;
use App\Services\ChatRoomMessageService;
use App\Services\QuestionCommentService;
use App\Services\Interfaces\AuthServiceInterface;
use App\Services\Interfaces\CodeServiceInterface;
use App\Services\Interfaces\UserServiceInterface;
use App\Services\Interfaces\InboxServiceInterface;
use App\Services\Interfaces\OnlineServiceInterface;
use App\Services\Interfaces\ThreadServiceInterface;
use App\Services\Interfaces\RequestServiceInterface;
use App\Services\Interfaces\ChatRoomServiceInterface;
use App\Services\Interfaces\ThreadQuestionServiceInterface;
use App\Services\Interfaces\ChatRoomMessageServiceInterface;
use App\Services\Interfaces\QuestionCommentServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(
            RequestServiceInterface::class,
            RequestService::class,
        );

        $this->app->singleton(
            CodeServiceInterface::class,
            CodeService::class,
        );

        $this->app->singleton(
            UserServiceInterface::class,
            UserService::class,
        );

        $this->app->singleton(
            ChatRoomServiceInterface::class,
            ChatRoomService::class,
        );

        $this->app->singleton(
            ChatRoomMessageServiceInterface::class,
            ChatRoomMessageService::class,
        );

        $this->app->singleton(
            OnlineServiceInterface::class,
            OnlineService::class,
        );

        $this->app->singleton(
            InboxServiceInterface::class,
            InboxService::class,
        );

        $this->app->singleton(
            AuthServiceInterface::class,
            AuthService::class,
        );

        $this->app->singleton(
            ThreadServiceInterface::class,
            ThreadService::class
        );

        $this->app->singleton(
            ThreadQuestionServiceInterface::class,
            ThreadQuestionService::class
        );

        $this->app->singleton(
            QuestionCommentServiceInterface::class,
            QuestionCommentService::class
        );
    }
}
