<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'finapi' => [
        'base_url' => env('FINAPI_BASE_URL', 'https://sandbox.finapi.io'),
        'webform_base_url' => env('FINAPI_WEBFORM_BASE_URL', 'https://webform-sandbox.finapi.io'),
        'client_id' => env('FINAPI_CLIENT_ID', 'test'),
        'client_secret' => env('FINAPI_CLIENT_SECRET', 'test'),
        'username' => env('FIN_API_USER', 'test'),
        'password' => env('FIN_API_PASSWORD', 'test'),
    ],
];
