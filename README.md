# Error Logger plugin for OctoberCMS

[![Codacy](https://img.shields.io/codacy/fd21835023b6413ca9a71815362ee22a.svg)](https://www.codacy.com/app/vojtasvoboda/oc-errorlogger-plugin)
[![Scrutinizer Coverage](https://img.shields.io/scrutinizer/g/vojtasvoboda/oc-errorlogger-plugin.svg)](https://scrutinizer-ci.com/g/vojtasvoboda/oc-errorlogger-plugin/?branch=master)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](https://github.com/vojtasvoboda/oc-errorlogger-plugin/blob/master/LICENSE.md)

Immediately sends an error from your OctoberCMS application to email, HipChat, Mandrill, NewRelic, Slack, Syslog, and more! Tested with the OctoberCMS build 430.

- no plugin dependencies
- easy setup, just fill your e-mail or API key
- define logging level for each service separately (send warnings to Syslog and critical errors directly to your email)
- know about all errors before your client/customer

## Installation

1. Install plugin [VojtaSvoboda.ErrorLogger](http://octobercms.com/plugin/vojtasvoboda-errorlogger)
2. Set your services at Backend > Settings > System > Error logger
3. Save and sleep with a clear mind!

## Services

- Native PHP mailer handler
- Swift Mailer handler (includes also SMTP, Mailgun, Mandrill, SES)
- Slack handler
- Syslog handler
- New Relic handler

Swift Mailer handler using OctoberCMS mail configuration. To setup this hanlder visit also Backend > Settings > Mail > Mail configuration.

## Contributing

Please send Pull Request to master branch.

_Handlers waiting for implementation:_ CouchDB, Cube, ElasticSearch, FirePHP, Flowdock, HipChat, IFTTT, MongoDB, Redis and more.

## TODO

- [ ] show button "Test" for trigger testing exception
- [ ] add new tab with name '...' with listing all possible extensions (Sentry, Bugsnag)
- [ ] can add more emails separated by comma

**Feel free to send pullrequest!**

## License

Error logger plugin is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT) same as OctoberCMS platform.
