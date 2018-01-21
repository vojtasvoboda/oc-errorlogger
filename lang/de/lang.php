<?php

return [
	'plugin' => [
		'name' => 'Error logger',
		'description' => 'Sendet Fehler via Email, HipChat, Mandrill, NewRelic, Slack, Syslog und mehr.'
	],
	'settings' => [
		'label' => 'Error logger',
		'description' => 'Benachrichtigungen, Emails und API-Schlüssel einstellen.',
	],
    'permissions' => [
        'tab' => 'Error logger',
        'all' => [
            'label' => 'Benachrichtigungs-Management'
        ]
    ],

    'nativemailer' => [
        'tab' => [
            'label' => 'PHP Native Mailer',
        ],
        'enabled' => [
            'label' => 'Email-Benachrichtigungen aktivieren',
        ],
        'email' => [
            'label' => 'Email-Adresse des Entwicklers',
            'comment' => 'Der Empfänger der Benachrichtigung',
        ],
        'level' => [
            'label' => 'Logging-Level',
            'comment' => 'Das minimale Logging-Level, bei dem diese Benachrichtigung ausgelöst wird',
        ],
        'debug' => [
            'label' => 'Im Debug-Modus ausschalten',
            'comment' => 'Im Debug-Modus werden keine Benachrichtigungen versendet',
        ],
    ],

    'swiftmailer' => [
        'tab' => [
            'label' => 'October CMS Mailer',
        ],
        'enabled' => [
            'label' => 'Email-Benachrichtigungen aktivieren',
        ],
        'email' => [
            'label' => 'Email-Adresse des Entwicklers',
            'comment' => 'Der Empfänger der Benachrichtigung',
        ],
        'level' => [
            'label' => 'Logging-Level',
            'comment' => 'Das minimale Logging-Level, bei dem diese Benachrichtigung ausgelöst wird',
        ],
        'debug' => [
            'label' => 'Im Debug-Modus ausschalten',
            'comment' => 'Im Debug-Modus werden keine Benachrichtigungen versendet',
        ],
    ],

    'slack' => [
        'tab' => [
            'label' => 'Slack'
        ],
        'enabled' => [
            'label' => 'Slack-Benachrichtigungen aktivieren'
        ],
        'token' => [
            'label' => 'Slack API Token',
            'comment' => 'Du findest dein API Token unter https://api.slack.com/web'
        ],
        'channel' => [
            'label' => 'Slack Channel',
            'comment' => 'Channel-ID, Channel-Name ("errors") oder Benutzername ("@vojtasvoboda"), falls eine direkte Nachricht gesendet werden soll'
        ],
        'username' => [
            'label' => 'Name des Bots',
            'comment' => 'Name des Bots, der die Benachrichtigung sendet (z. B. "error-bot")'
        ],
        'attachment' => [
            'label' => 'Als Anhang senden (optional)',
            'comment' => 'Ob die Nachricht als Anhang an Slack versendet werden soll'
        ],
        'level' => [
            'label' => 'Logging-Level',
            'comment' => 'Das minimale Logging-Level, bei dem diese Benachrichtigung ausgelöst wird'
        ],
    ],

    'syslog' => [
        'tab' => [
            'label' => 'Syslog'
        ],
        'enabled' => [
            'label' => 'Syslog aktivieren'
        ],
        'ident' => [
            'label' => 'Identität',
            'comment' => 'Identität der Applikation (z. B. meinesupersite)'
        ],
        'facility' => [
            'label' => 'Installation',
            'comment' => 'Installationsbezeichnung (z. B. local6)'
        ],
        'level' => [
            'label' => 'Logging-Level',
            'comment' => 'Das minimale Logging-Level, bei dem diese Benachrichtigung ausgelöst wird'
        ],
    ],

    'newrelic' => [
        'tab' => [
            'label' => 'New Relic'
        ],
        'enabled' => [
            'label' => 'New Relic-Benachrichtigungen aktivieren'
        ],
        'appname' => [
            'label' => 'Applikationsname',
            'comment' => 'Name der New Relic Applikation, in der die Benachrichtigungen eingetragen werden sollen'
        ],
        'level' => [
            'label' => 'Logging-Level',
            'comment' => 'Das minimale Logging-Level, bei dem diese Benachrichtigung ausgelöst wird'
        ],
    ]
];
