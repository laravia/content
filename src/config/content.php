<?php

use Laravia\Core\App\Laravia;

$config['content'] = [
    'links' => [
        ['name' => 'laravia.content::index', 'text' => Laravia::trans('content.siteTitleIndex'), 'sort' => 10],
    ],
];

return $config;
