<?php

namespace Laravia\Content\App\Providers;

use Laravia\Content\App\Models\Content;
use Laravia\Core\App\Providers\ServiceProvider;
use Laravia\User\App\Models\User;

class ContentServiceProvider extends ServiceProvider
{
    protected $name = "content";

    public function boot()
    {
        $this->addRelations();

        $this->defaultBootMethod();
    }

    private function addRelations()
    {
        User::resolveRelationUsing('contents', function ($model) {
            return $model->hasMany(Content::class);
        });
    }
}
