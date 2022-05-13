<?php

use Laravia\Core\App\Laravia;

$config['content'] = [
    'links' => [
        ['name' => 'laravia.content::home', 'text' => Laravia::trans('content.siteTitleHome'), 'sort' => 10],
    ],
];

return $config;
