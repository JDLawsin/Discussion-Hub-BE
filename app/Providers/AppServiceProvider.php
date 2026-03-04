<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Protocol;
use App\Models\Review;
use App\Models\Thread;
use App\Models\Vote;
use App\Observers\ProtocolObserver;
use App\Observers\ReviewObserver;
use App\Observers\ThreadObserver;
use App\Observers\VoteObserver;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Relation::morphMap([
            'protocol' => Protocol::class,
            'thread'   => Thread::class,
            'comment'  => Comment::class,
        ]);

        Review::observe(ReviewObserver::class);
        Vote::observe(VoteObserver::class);
        Protocol::observe(ProtocolObserver::class);
        Thread::observe(ThreadObserver::class);
    }
}
