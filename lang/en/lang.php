<?php

return [
	'plugin' => [
		'name' => 'Error logger',
		'description' => 'Send errors to email, HipChat, Mandrill, NewRelic, Slack, Syslog, and more.'
	],
	'settings' => [
		'label' => 'Error logger',
		'description' => 'Set notification services, e-mails and API keys.',
	],
    'permissions' => [
        'tab' => 'Error logger',
        'all' => [
            'label' => 'Error sending and notifications management'
        ]
    ],

    'nativemailer' => [
        'tab' => [
            'label' => 'PHP Native Mailer'
        ],
        'enabled' => [
            'label' => 'Enable email notification'
        ],
        'email' => [
            'label' => 'Developer email',
            'comment' => 'The receiver of the mail with notifications'
        ],
        'level' => [
            'label' => 'Logging level',
            'comment' => 'The minimum logging level at which this handler will be triggered'
        ],
        'debug' => [
            'label' => 'Disable when debug',
            'comment' => 'Sending e-mail will be disabled when debug is true'
        ]
    ],

    'swiftmailer' => [
        'tab' => [
            'label' => 'October CMS Mailer'
        ],
        'enabled' => [
            'label' => 'Enable email notification'
        ],
        'email' => [
            'label' => 'Developer email',
            'comment' => 'The receiver of the mail with notifications'
        ],
        'level' => [
            'label' => 'Logging level',
            'comment' => 'The minimum logging level at which this handler will be triggered'
        ],
        'debug' => [
            'label' => 'Disable when debug',
            'comment' => 'Sending e-mail will be disabled when debug is true'
        ]
    ],

    'slack' => [
        'tab' => [
            'label' => 'Slack'
        ],
        'enabled' => [
            'label' => 'Enable Slack notification'
        ],
        'token' => [
            'label' => 'Slack API token',
            'comment' => 'Get your own API token at https://api.slack.com/web'
        ],
        'channel' => [
            'label' => 'Slack channel',
            'comment' => 'Channel encoded ID or name (errors) or username (@vojtasvoboda) to send as direct message'
        ],
        'username' => [
            'label' => 'Name of a bot',
            'comment' => 'Name of a bot who sends notifications, e.g. error-bot, or project name'
        ],
        'attachment' => [
            'label' => 'Send as attachment (optional)',
            'comment' => 'Whether the message should be added to Slack as attachment (plain text otherwise)'
        ],
        'level' => [
            'label' => 'Logging level',
            'comment' => 'The minimum logging level at which this handler will be triggered'
        ],
    ],

    'syslog' => [
        'tab' => [
            'label' => 'Syslog'
        ],
        'enabled' => [
            'label' => 'Enable Syslog notification'
        ],
        'ident' => [
            'label' => 'Ident',
            'comment' => 'Application ident (e.g. mysupersite)'
        ],
        'facility' => [
            'label' => 'Facility',
            'comment' => 'Application facility (e.g. local6)'
        ],
        'level' => [
            'label' => 'Logging level',
            'comment' => 'The minimum logging level at which this handler will be triggered'
        ],
    ],

    'newrelic' => [
        'tab' => [
            'label' => 'New Relic'
        ],
        'enabled' => [
            'label' => 'Enable New Relic notification'
        ],
        'appname' => [
            'label' => 'Application name',
            'comment' => 'Name of the New Relic application that will receive notifications'
        ],
        'level' => [
            'label' => 'Logging level',
            'comment' => 'The minimum logging level at which this handler will be triggered'
        ],
    ]
];
