<?php

return [
    'neshan' => [
        'apis' => [
            'search' => [
                'url' => 'https://api.neshan.org/v1/search',
                'method' => 'get',
                'params' => ['term', 'lat', 'lng'],
                'headers' => [
                    'Api-Key' => env('NESHAN_API_KEY')
                ]
            ]
        ]
    ]
];