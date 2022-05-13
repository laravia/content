<?php

namespace Laravia\Content\App\Providers;

use Illuminate\Support\Facades\App;
use Laravia\Core\App\Laravia;
use Laravia\Core\App\Providers\LaraviaServiceProvider;

class ContentServiceProvider extends LaraviaServiceProvider
{
    protected $name = 'content';

    public function boot()
    {
        $this->loadViewsFrom(Laravia::path()->get($this->name) . '/resources/views', $this->getPackagePrefix());
        $this->loadMigrationsFrom(Laravia::path()->get($this->name) . '/database/migrations');
        $this->loadSeedsFrom(Laravia::path()->get($this->name) . '/database/seeders', 'Laravia\\Content\\Database\\Seeders\\');

        App::booted(function () {
            $path = Laravia::path()->get($this->name) . '/routes/web.php';
            $this->loadRoutesFrom($path);
        });
    }
}
