<?php

namespace Laravia\Content\App\Providers;

use Laravia\Core\App\Providers\ServiceProvider;

class ContentServiceProvider extends ServiceProvider
{
    protected $name = "content";

    public function boot()
    {
        $this->defaultBootMethod();
    }
}
