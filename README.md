# Web Artisan plugin for OctoberCMS

[![Codacy](https://img.shields.io/codacy/5e98d8323ff64df59cb2be7f5db579f4)](https://www.codacy.com/app/vojtasvoboda/oc-webartisan-plugin)
[![Scrutinizer Coverage](https://img.shields.io/scrutinizer/g/vojtasvoboda/oc-webartisan-plugin.svg)](https://scrutinizer-ci.com/g/vojtasvoboda/oc-webartisan-plugin/?branch=master)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](https://github.com/vojtasvoboda/oc-webartisan-plugin/blob/master/LICENSE)

Plugin allows you to run artisan commands by public URL. You can call this URL by `http`, `curl` or `wget`.

Example: `http://www.domain.com/artisan/v1/cache/clear/secret-hash`

This could be useful:

- when you **don't have SSH access** to your server and wants to run some commands
- when you **don't have access to /etc/crontab** and want to run scheduled tasks from outside
- when you **want to run scheduled tasks** by online CRON tools like webcron.org etc.
- when you **want to run commands** by services like IFTTT, Zapier, etc.
- for deployment and automated tasks

## Configuration

Before call any command you have to set secret hash at **Backend > Settings > System > Web Artisan**. Run without 
secret hash is not possible due to security reasons.

For generating secret hash use some [random generator](http://gen.7ka.cz/?c=16).

## Usage

General pattern is:

`http://www.domain.com/artisan/v1/{group}/{command}/{secret}`

Run command `cache:clear` by URL:

`http://www.domain.com/artisan/v1/cache/clear/1234567890abcdef`

Run command `schedule:run` by curl:

`curl http://www.domain.com/artisan/v1/schedule/run/1234567890abcdef`

## Available commands

Whitelist: auth:clear-resets, cache:clear, october:update, queue:flush, queue:forget, queue:restart, queue:retry, queue:work,
route:clear, schedule:run, view:clear.

Wants more? [Override plugin's config file](http://octobercms.com/docs/plugin/settings#file-configuration) and add your commands as you wish.

## Queued commands

You can queue commands so they are processed in the background by your queue workers. Before using this method, make sure 
you have configured your queue and are running a queue listener.

For running queue commands just put prefix `queued` before command

`http://www.domain.com/artisan/v1/queued/{group}/{command}/{secret}`

for example

`http://www.domain.com/artisan/v1/queued/october/update/1234567890abcdef`

## TODO

- [ ] pass Artisan to CommandRunner through constructor as Illuminate\Console\Application
- [ ] set hash also by config (when you want to fire october:up on stage server)

## Contributing

Please send Pull Request to the master branch.

## License

Web artisan plugin is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT) same as OctoberCMS platform.
