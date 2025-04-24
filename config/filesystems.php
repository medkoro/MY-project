<?php

return [
    'default' => env('FILESYSTEM_DISK', 'public'), // Changé de 'local' à 'public'

    'disks' => [
        'local' => [
            'driver' => 'local',
            'root' => storage_path('app/private'),
            'throw' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
            'throw' => false,
            'permissions' => [
                'file' => [
                    'public' => 0664,
                    'private' => 0600,
                ],
                'dir' => [
                    'public' => 0775,
                    'private' => 0700,
                ],
            ],
        ],

        'media' => [ // Nouveau disque spécifique pour les médias
            'driver' => 'local',
            'root' => storage_path('app/public/media'),
            'url' => env('APP_URL').'/storage/media',
            'visibility' => 'public',
            'throw' => false,
        ],

        's3' => [
            'driver' => 's3',
            // Configuration S3 inchangée
        ],
    ],

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],
];