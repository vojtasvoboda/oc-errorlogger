<?php namespace VojtaSvoboda\ErrorLogger;

use Backend\Facades\BackendAuth;
use Config;
use Log;
use Monolog\Handler\SwiftMailerHandler;
use Swift_Message;
use VojtaSvoboda\ErrorLogger\Models\Settings;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\NativeMailerHandler;
use Monolog\Handler\NewRelicHandler;
use Monolog\Handler\SlackHandler;
use Monolog\Logger;
use System\Classes\PluginBase;

/**
 * Error Logger Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name' => 'vojtasvoboda.errorlogger::lang.plugin.name',
            'description' => 'vojtasvoboda.errorlogger::lang.plugin.description',
            'author' => 'Vojta Svoboda',
            'icon' => 'icon-bug',
        ];
    }

    public function registerSettings()
    {
        return [
            'config' => [
                'label' => 'vojtasvoboda.errorlogger::lang.settings.label',
                'category' => 'system::lang.system.categories.system',
                'icon' => 'icon-bug',
                'description' => 'vojtasvoboda.errorlogger::lang.settings.description',
                'class' => 'VojtaSvoboda\ErrorLogger\Models\Settings',
                'permissions' => ['vojtasvoboda.errorlogger.*'],
                'order' => 610,
            ]
        ];
    }

    public function registerPermissions()
    {
        return [
            'vojtasvoboda.errorlogger.*' => [
                'tab' => 'vojtasvoboda.errorlogger::lang.permissions.tab',
                'label' => 'vojtasvoboda.errorlogger::lang.permissions.all.label'
            ]
        ];
    }

    /**
     * Boot plugin and register handlers
     */
    public function boot()
    {
        /** @var Logger $monolog */
        $monolog = Log::getMonolog();

        $this->setNativeMailerHandler($monolog);
        $this->setSwiftMailerHandler($monolog);
        $this->setSlackHandler($monolog);
        $this->setSyslogHandler($monolog);
        $this->setNewrelicHandler($monolog);
    }

    /**
     * Set native mailer handler.
     * 
     * Formatting lines example (use before pushHandler()):
     *   $formater = new LineFormatter("[%datetime%] %channel%.%level_name%: %message% %context% %extra%\n");
     *   $handler->setFormatter($formater);
     *
     * @param Logger $monolog
     *
     * @return Logger
     */
    private function setNativeMailerHandler($monolog)
    {
        $required = ['nativemailer_enabled', 'nativemailer_email'];
        if (!$this->checkRequiredFields($required)) {
            return $monolog;
        }

        // disable when debug is true
        $debug = Settings::get('nativemailer_debug');
        if ($debug & Config::get('app.debug')) {
            return $monolog;
        }

        $email = Settings::get('nativemailer_email');
        $subject = Config::get('app.url') . ' - error report';
        $from = Config::get('mail.from.address');
        $level = Settings::get('nativemailer_level', 100);
        $handler = new NativeMailerHandler($email, $subject, $from, $level);
        $monolog->pushHandler($handler);

        return $monolog;
    }

    /**
     * Set Swift mailer handler, where SwiftMailer instance is taken from OctoberCMS.
     *
     * @param Logger $monolog
     *
     * @return Logger
     */
    private function setSwiftMailerHandler($monolog)
    {
        $required = ['swiftmailer_enabled', 'swiftmailer_email'];
        if (!$this->checkRequiredFields($required)) {
            return $monolog;
        }

        // disable when debug is true
        $debug = Settings::get('swiftmailer_debug');
        if ($debug & Config::get('app.debug')) {
            return $monolog;
        }

        // get the mailer from OctoberCMS
        $octoberMailer = $this->app->make('mailer');
        $swiftMailer = $octoberMailer->getSwiftMailer();

        // get message parameters
        $email = Settings::get('swiftmailer_email');
        $subject = Config::get('app.url') . ' - error report';
        $from = Config::get('mail.from.address');
        $level = Settings::get('swiftmailer_level', 100);

        // prepare message
        $message = new Swift_Message($subject);
        $message->addFrom($from);
        $message->addTo($email);

        // register handler
        $handler = new SwiftMailerHandler($swiftMailer, $message, $level);
        $monolog->pushHandler($handler);

        return $monolog;
    }

    /**
     * Set handler for Slack messaging app.
     *
     * @param Logger $monolog
     *
     * @return Logger
     */
    private function setSlackHandler($monolog)
    {
        $required = ['slack_enabled', 'slack_token'];
        if (!$this->checkRequiredFields($required)) {
            return $monolog;
        }

        $token = Settings::get('slack_token');
        $channel = Settings::get('slack_channel', 'random');
        $username = Settings::get('slack_username', 'error-bot');
        $attachment = Settings::get('slack_attachment', false);
        $level = Settings::get('slack_level', 100);
        $handler = new SlackHandler($token, $channel, $username, $attachment, null, $level);
        $monolog->pushHandler($handler);

        return $monolog;
    }

    /**
     * Set handler for Syslog.
     *
     * @param Logger $monolog
     *
     * @return Logger
     */
    private function setSyslogHandler($monolog)
    {
        $required = ['syslog_enabled', 'syslog_ident', 'syslog_facility'];
        if (!$this->checkRequiredFields($required)) {
            return $monolog;
        }

        $ident = Settings::get('syslog_ident');
        $facility = Settings::get('syslog_facility');
        $level = Settings::get('syslog_level', 100);
        $handler = new SyslogHandler($ident, $facility, $level);
        $monolog->pushHandler($handler);

        return $monolog;
    }

    /**
     * Set handler for New Relic.
     *
     * @param Logger $monolog
     *
     * @return Logger
     */
    private function setNewrelicHandler($monolog)
    {
        $required = ['newrelic_enabled', 'newrelic_appname'];
        if (!$this->checkRequiredFields($required)) {
            return $monolog;
        }

        $appname = Settings::get('newrelic_appname');
        $level = Settings::get('newrelic_level', 100);
        $bubble = true;
        $handler = new NewRelicHandler($level, $bubble, $appname);
        $monolog->pushHandler($handler);

        return $monolog;
    }

    /**
     * Check each required field if exist and not empty.
     *
     * @param array $fields
     *
     * @return bool
     */
    private function checkRequiredFields(array $fields)
    {
        foreach ($fields as $field) {
            $value = Settings::get($field);
            if (!$value || empty($value)) {
                return false;
            }
        }

        return true;
    }
}
