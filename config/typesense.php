<?php

return [
    'api_key'  => env('TYPESENSE_API_KEY'),
    'host'     => env('TYPESENSE_HOST'),
    'port'     => env('TYPESENSE_PORT', 443),
    'protocol' => env('TYPESENSE_PROTOCOL', 'https'),
];