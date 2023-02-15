<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been set up for each driver as an example of the required values.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'throw' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
            'throw' => false,
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
        ],

        'gcs' => [
            'driver' => 'gcs',
            'key_file' => [
                'type' => 'service_account',
                'private_key_id' => env('GOOGLE_PRIVATE_KEY_ID'),
                'private_key' => "-----BEGIN PRIVATE KEY-----\nMIIEvAIBADANBgkqhkiG9w0BAQEFAASCBKYwggSiAgEAAoIBAQCzgAvqACMD2Ic2\nNGqSwSw+ViVg+Rf/tJRKrsqX1qTgDRZ2S7T1OMEB6Y5TaDFJI2mw/tIKNwsTVVld\n4LAVHArZCpNuL/TAI4kSmXxzVoBBSNdR3rPzuC44x2tA3yPqZsCsKBwlTjPbl8qt\nhGXlsxAj2+Vtojsbfrl8o6q6mPOp1VjLLoxjSPYGwEUyFcIxkDfE6I15GMAAVaRW\niZ3ty2jXabrA9GLLI541LMhxtAOqSRV5HOJjp2ffP9pKGPmu2700r2Dk1KkcqUxA\nKe1v1rjG/b5rxWLSEOutpSPzxt4W7QUS2U7SuMm5BL6Av0xDsT7JIsBvicLf5n6l\nqaBzyW6pAgMBAAECggEAFYdOxoDAMlqisutb+eB90jcqUgRmLrbFj2SB626kxTOE\npWkEmeG18mkE9zd4q805xK73WZ7K7wVuS75iWBHOMkRctNs/F1lbvBWZEctG5C2c\nl5bmjd1h+9DdKgFpURiEVNGVuJq1yQleV2vY/dD5Z1edH4ZU4QIUtKB7nlgwZ0a5\nw6K2C29SrJu9O23MTqisM1cXSLed5DC6CBd1JPT6wHEUGMCXqps0xAa9h8wlKOem\nSmrIlx8MO+/xqO0mLfd/0yENTfJrBadRB29AP9RYiZsFlQcMTaDVzG/21y6FLGqC\nBNpCoRElEbKgUAui0+0nZ7ixGFlKqAhEZOV8qSspFQKBgQDzRnpPr0pTC9k8Ouzo\nwgYUohauEJsF5CYC9uulVc4PCgew8TimSdX/ehr4U48DygdlPGCXh1XZj0v593l5\nqUIoxEtnE0X6JfeBW+TLN1ZhjRe/zI9KycI4EbfiHR0FedjaJntqPHVeLncVY71W\nDm3lD5FGo/LSRIw/KDyLNbWwJQKBgQC845pEApRmvv6nFx//y5BUdhS5etB7KzRi\n53Ajjg9rdQuVNDG4UEIvMvB6D62elTMVQXrit2WuGZ8xoI8AHrA/GJjJ3na0oNkY\n6RjwlUErYb6c1xhprVJTyEscn6746nkTlYVPYMSiBqrPOLWPJEEqbCxUrGqrnYNB\nM99+7HLrNQKBgEzNSTvy6RICwZhEOhrZdjX5XhOh5m8bsexpq8dMqXsR/Y+c9/d3\ng/ndwLn5F0No+qC5SP1NmorOtHu75zvDdcGNBwkJiqQIbHUIX9jQJZMyifbhS7Oe\nspQk89qMumbKKu3kDD5jy+Hp5Wp5TILol0UjfwfAJp6/SU9/Em4YjL2JAoGAHY/9\np+FDeqUv09ThtDYW27EzYygekvhbFZOlUFs+fJHwAyUNFwywnxR44JGtmaE+Qnhi\nFDOh3VKzQKAhYWJsMSPXXdjMeU6nS6fHuHeToIeGvqNHddqjhOtXHh670sdXtcH0\nAE1j2Pv0JcR5XfLNpCcT9RibBUr8rOrCcunsvnUCgYBC8iCPcEGBJa2Nzz7AfXjU\nB3KpF2mdoXAuRQPOeSGmzVx4bKM3kTMbsvZXe+Kaz6IKam73D1B4ndSWpHpfAYL7\nJzviB7zZyEFpph6nLTtrk1nxn3EEjLKVzR2kvBcMZA5rFMnRFwcVz/kRa4T7FzBu\nIMWzZVuoTn6GklZQWJNFgA==\n-----END PRIVATE KEY-----\n",
                'client_email' => "castusserviceaccount@fixly-331216.iam.gserviceaccount.com",
                'client_id' => env('GOOGLE_CLIENT_ID'),
                'auth_uri' => 'https://accounts.google.com/o/oauth2/auth',
                'token_uri' => 'https://oauth2.googleapis.com/token',
                'auth_provider_x509_cert_url' => 'https://www.googleapis.com/oauth2/v1/certs',
                'client_x509_cert_url' => 'https://www.googleapis.com/robot/v1/metadata/x509/castusserviceaccount%40fixly-331216.iam.gserviceaccount.com',
            ],
            'project_id' => env('GOOGLE_CLOUD_PROJECT_ID', 'fixly-331216'),
            'bucket' => env('GOOGLE_CLOUD_STORAGE_BUCKET', 'castusphotos'),
            'path_prefix' => env('GOOGLE_CLOUD_STORAGE_PATH_PREFIX', ''),
            'storage_api_uri' => env('GOOGLE_CLOUD_STORAGE_API_URI', null),
            'apiEndpoint' => env('GOOGLE_CLOUD_STORAGE_API_ENDPOINT', null),
            'visibility' => 'public',
            'visibility_handler' => null,
            'metadata' => ['cacheControl' => 'public,max-age=86400'],
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
