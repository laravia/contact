<?php

use Laravia\Core\App\Laravia;

$config['contact'] = [
    'links' => [
        [
            ['name' => 'laravia.contact::index', 'text' => Laravia::trans('contact.siteTitleIndex'), 'sort' => 10],
        ],
    ],
];

return $config;
