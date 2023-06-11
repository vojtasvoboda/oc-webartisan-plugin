<?php return [
    'plugin' => [
        'name'             => 'Web Artisan',
        'description'       => 'Runs artisan commands by URL, curl or wget'
    ],
    'settings' => [
        'label'             => 'Web Artisan',
        'description'       => 'Runs artisan commands by URL, curl or wget'
    ],
    'permissions' => [
        'settings'             => 'Access Web Artisan',

    ],
    'commandrunner' => [
        'command_not_allowed'   =>   "This command is not allowed.",
        'controll_hash'         => "You have to set controll hash at backend settings and it should be at least 16 characters length.",
        'wrong_hash' => 'Wrong control hash. Check backend settings.'
    ],
    'settings_fields' => [
        'hint_label' => 'Available commands',
        'hash_label' => 'Hash',
        'hash_comment' =>       'Secret hash for calling command by public URL. Hash should be at least 16 characters length.'
    ]

];
