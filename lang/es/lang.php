<?php

return [
    'plugin' => [
        'name' => 'Registrador de errores (Error logger)',
        'description' => 'Envia registro de errores al correo electrónico, HipChat, Mandrill, NewRelic, Slack, Syslog, y más.'
    ],
    'settings' => [
        'label' => 'Registrador de errores (Error logger)',
        'description' => 'Configura servicios de notificación, correos electrónicos y claves de APIs.',
    ],
    'permissions' => [
        'tab' => 'Registrador de errores (Error logger)',
        'all' => [
            'label' => 'Gestión de envío y notificación de errores.'
        ]
    ],

    'nativemailer' => [
        'tab' => [
            'label' => 'PHP Native Mailer',
        ],
        'enabled' => [
            'label' => 'Habilitar notificaciones por correo electrónico'
        ],
        'email' => [
            'label' => 'E-mail del desarrador',
            'comment' => 'El destinatario de las notificaciones por correo electrónico'
        ],
        'level' => [
            'label' => 'Nivel de registro',
            'comment' => 'El nivel mínimo de registro que provocará que este controlador se desencadene'
        ],
        'debug' => [
            'label' => 'Deshabilitar cuando PHP esté en modo debug',
            'comment' => 'El envío de correos electrónicos será deshabilitado cuando debug es verdadero'
        ],
    ],

    'swiftmailer' => [
        'tab' => [
            'label' => 'October CMS mailer',
        ],
        'enabled' => [
            'label' => 'Habilitar notificaciones por correo electrónico',
        ],
        'email' => [
            'label' => 'E-mail del desarrador',
            'comment' => 'El destinatario de las notificaciones por correo electrónico',
        ],
        'level' => [
            'label' => 'Nivel de registro',
            'comment' => 'El nivel mínimo de registro que provocará que este controlador se desencadene',
        ],
        'debug' => [
            'label' => 'Deshabilitar cuando PHP esté en modo debug',
            'comment' => 'El envío de correos electrónicos será deshabilitado cuando debug es verdadero',
        ],
    ],

    'slack' => [
        'tab' => [
            'label' => 'Slack'
        ],
        'enabled' => [
            'label' => 'Habilitar noficaciones hacia Slack'
        ],
        'token' => [
            'label' => 'Token para el API de Slack',
            'comment' => 'Obten tu propio token del API accediendo a https://api.slack.com/web'
        ],
        'channel' => [
            'label' => 'Canal de Slack',
            'comment' => 'ID o nombre del Canal (ej. errors) o usuario (ej. @vojtasvoboda) para enviar mensaje directo'
        ],
        'username' => [
            'label' => 'Nombre del robot',
            'comment' => 'Nombre del robot que envia las notificaciones, ej. error-bot, o nombre del proyecto'
        ],
        'attachment' => [
            'label' => 'Enviar como archivo adjunto (opcional)',
            'comment' => 'Define si el mensaje debería ser añadido a Slack como un archivo adjunto (se envía en texto plano de lo contrario)'
        ],
        'level' => [
            'label' => 'Nivel de registro',
            'comment' => 'El nivel mínimo de registro que provocará que este controlador se desencadene'
        ],
    ],

    'syslog' => [
        'tab' => [
            'label' => 'Syslog'
        ],
        'enabled' => [
            'label' => 'Habilitar notificaciones hacia Syslog'
        ],
        'ident' => [
            'label' => 'Identificación',
            'comment' => 'Identificación de la aplicación (ej. misupersitio)'
        ],
        'facility' => [
            'label' => 'Instalación',
            'comment' => 'Instalación de la aplicación (ej. local6)'
        ],
        'level' => [
            'label' => 'Nivel de registro',
            'comment' => 'El nivel mínimo de registro que provocará que este controlador se desencadene'
        ],
    ],

    'newrelic' => [
        'tab' => [
            'label' => 'New Relic'
        ],
        'enabled' => [
            'label' => 'Habilitar notificaciones hacia New Relic'
        ],
        'appname' => [
            'label' => 'Nombre de la aplicación',
            'comment' => 'Nombre de la aplicación de New Relic que recibirá las notificaciones'
        ],
        'level' => [
            'label' => 'Nivel de registro',
            'comment' => 'El nivel mínimo de registro que provocará que este controlador se desencadene'
        ],
    ]
];
