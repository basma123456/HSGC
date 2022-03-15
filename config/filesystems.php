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

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],





        'css_front' => [
            'driver' => 'local',
            'root' => base_path('public/assets/css_front/'),
            'url' => env('APP_URL').'/public',
            'visibility' => 'public',
        ],


        'js_front' => [
            'driver' => 'local',
            'root' => base_path('public/assets/js_front/'),
            'url' => env('APP_URL').'/public',
            'visibility' => 'public',
        ],


        'images_front' => [
            'driver' => 'local',
            'root' => base_path('public/assets/images_front/'),
            'url' => env('APP_URL').'/public',
            'visibility' => 'public',
        ],


        'webfonts_front' => [
            'driver' => 'local',
            'root' => base_path('public/assets/webfonts_front/'),
            'url' => env('APP_URL').'/public',
            'visibility' => 'public',
        ],


        'about_company' => [
            'driver' => 'local',
            'root' => base_path('public/assets/images_front/about_company/'),
            'url' => env('APP_URL').'/public',
            'visibility' => 'public',
        ],

        'projects_page' => [
            'driver' => 'local',
            'root' => base_path('public/assets/images_front/projects_page/'),
            'url' => env('APP_URL').'/public',
            'visibility' => 'public',
        ],


        'employees_images' => [
            'driver' => 'local',
            'root' => base_path('public/assets/images_front/employees_images/'),
            'url' => env('APP_URL').'/public',
            'visibility' => 'public',
        ],

        'clients_images' => [
            'driver' => 'local',
            'root' => base_path('public/assets/images_front/clients_images/'),
            'url' => env('APP_URL').'/public',
            'visibility' => 'public',
        ],


        'news_images' => [
            'driver' => 'local',
            'root' => base_path('public/assets/images_front/news_images/'),
            'url' => env('APP_URL').'/public',
            'visibility' => 'public',
        ],




        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
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
