<?php return [
    'plugin' => [
        'name'             => 'Web Artisan',
        'description'       => "Lancer des commandes artisan à l'aide d'URL, CURL ou wget"
    ],
    'settings' => [
        'label'             => 'Web Artisan',
        'description'       => "Lancer des commandes artisan à l'aide d'URL, CURL ou wget"
    ],
    'permissions' => [
        'settings'             => 'Accéder aux paramètres de Web Artisan',
    ],
    'commandrunner' => [
        'command_not_allowed'   =>   "Cette commande n'est pas autorisée",
        'controll_hash'         => "Vous devez définir le hash dans les paramétrages. Il doit avoir au moins 16 charactères.",
        'wrong_hash'            => "Le hash n'est pas correct. Vérifiez le paramétrage."
    ],
    'settings_fields' => [
        'hint_label' => 'Commandes disponibles',
        'hash_label' => 'Hash',
        'hash_comment' =>       "Hash secret pour l'appel des commandes par une URL publique. Le hash doit avoir au moins 16 caractères."
    ]
];
