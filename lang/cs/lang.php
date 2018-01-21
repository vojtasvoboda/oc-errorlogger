<?php

return [
    'plugin' => [
        'name' => 'Error logger',
        'description' => 'Zasílání chyb na e-mail, HipChat, Mandrill, NewRelic, Slack, Syslog, a další.'
    ],
    'settings' => [
        'label' => 'Zasílání chyb',
        'description' => 'Nastavení služeb, e-mailů a API klíčů.',
    ],
    'permissions' => [
        'tab' => 'Error logger',
        'all' => [
            'label' => 'Správa zasílání chyb'
        ]
    ],

    'nativemailer' => [
        'tab' => [
            'label' => 'PHP Native Mailer',
        ],
        'enabled' => [
            'label' => 'Zapnout e-mailové notifikace',
        ],
        'email' => [
            'label' => 'E-mail vývojáře',
            'comment' => 'E-mail na který budou chodit chyby a notifikace',
        ],
        'level' => [
            'label' => 'Úroveň logování',
            'comment' => 'Minimální úroveň logování která bude zachycena a odeslána na e-mail',
        ],
        'debug' => [
            'label' => 'Vypnout při debugování',
            'comment' => 'E-mailové notifikace se vypnout, pokud je nastaven parametr aplikace debug na true',
        ],
    ],

    'swiftmailer' => [
        'tab' => [
            'label' => 'October CMS Mailer',
        ],
        'enabled' => [
            'label' => 'Zapnout e-mailové notifikace',
        ],
        'email' => [
            'label' => 'E-mail vývojáře',
            'comment' => 'E-mail na který budou chodit chyby a notifikace',
        ],
        'level' => [
            'label' => 'Úroveň logování',
            'comment' => 'Minimální úroveň logování která bude zachycena a odeslána na e-mail',
        ],
        'debug' => [
            'label' => 'Vypnout při debugování',
            'comment' => 'E-mailové notifikace se vypnout, pokud je nastaven parametr aplikace debug na true',
        ],
    ],

    'slack' => [
        'tab' => [
            'label' => 'Slack'
        ],
        'enabled' => [
            'label' => 'Zapnout Slack notifikace'
        ],
        'token' => [
            'label' => 'Slack API token',
            'comment' => 'Token získáte na https://api.slack.com/web'
        ],
        'channel' => [
            'label' => 'Slack kanál',
            'comment' => 'ID nebo jméno kanálu (errors) nebo uživatelské jméno (@vojtasvoboda) pro poslání notifikace přímo uživateli'
        ],
        'username' => [
            'label' => 'Název robota',
            'comment' => 'Název robota který doručí notifikaci, například error-bot, nebo název projektu'
        ],
        'attachment' => [
            'label' => 'Zaslat jako přílohu (volitelné)',
            'comment' => 'Zašrtnutím se zašle notifikace jako příloha (jinak dorazí jako čistý text)'
        ],
        'level' => [
            'label' => 'Úroveň logování',
            'comment' => 'Minimální úroveň logování která bude zachycena a odeslána na e-mail'
        ],
    ],

    'syslog' => [
        'tab' => [
            'label' => 'Syslog'
        ],
        'enabled' => [
            'label' => 'Zapnout Syslog notifikace'
        ],
        'ident' => [
            'label' => 'Identifikátor',
            'comment' => 'Aplikační identifikátor (např. mysupersite)'
        ],
        'facility' => [
            'label' => 'Název stroje',
            'comment' => 'Název aplikačního stroje pro logování (např. local6)'
        ],
        'level' => [
            'label' => 'Úroveň logování',
            'comment' => 'Minimální úroveň logování která bude zachycena a odeslána na e-mail'
        ],
    ],

    'newrelic' => [
        'tab' => [
            'label' => 'New Relic'
        ],
        'enabled' => [
            'label' => 'Zapnout New Relic notifikace'
        ],
        'appname' => [
            'label' => 'Název aplikace',
            'comment' => 'Název aplikace (appname), která bude dostávat chybové hlášky'
        ],
        'level' => [
            'label' => 'Úroveň logování',
            'comment' => 'Minimální úroveň logování která bude zachycena a odeslána na e-mail'
        ],
    ]
];
