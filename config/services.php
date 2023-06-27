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

    'whatsapp' => [
        'from-phone-number-id' => env('108065782333794'),
        'token' => env('EAALQMeYYfRoBAJdZA0EXtTP3ZBuU5qPsxMF0H642NzHZC88ZCB7Rl15ShYR7Ph3J5csLFZCD2lUGMEMRkxjzi37fHRbEi6zd6MmuPDWOTQL8DphVALw5pPA8vl5ZAfFVkaQ8ShOk4w82BJL1bzfgjaVX0YYqWiG6jlHrqSq813ZCed5lHOAa0dwon4KLlNtddFaxeuhSsnoupVNOLjaz3oQQnYJOZAQzxGUZD'),
    ],

];