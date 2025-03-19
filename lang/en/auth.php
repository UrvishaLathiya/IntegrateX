<?php

return [
    'defaults' => [
        'guard' => 'placement_officer', // ✅ Set default guard
        'passwords' => 'placement_officers',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'placement_officer' => [ // ✅ Define guard for Placement Officers
            'driver' => 'session',
            'provider' => 'placement_officers',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'placement_officers' => [ // ✅ Define provider for placement_officers
            'driver' => 'eloquent',
            'model' => App\Models\PlacementOfficer::class,
        ],
    ],
];


