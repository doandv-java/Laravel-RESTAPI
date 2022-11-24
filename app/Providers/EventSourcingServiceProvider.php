<?php

namespace App\Providers;

use Domain\Blogging\Projectors\PostProjector;
use Domain\Blogging\Reactors\PostReactor;
use Illuminate\Support\ServiceProvider;
use Spatie\EventSourcing\Facades\Projectionist;


class EventSourcingServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        Projectionist::addProjectors(
            [PostProjector::class],
        );
        Projectionist::addReactors(
            [PostReactor::class]
        );
    }


    public function boot(): void
    {
        //
    }
}
