# kenv

Env file & string parser for KPHP.

Kenv provide two methods:

```php
parse_env_file(string $filename)

parse_env_string(string $env_string)
```

Both methods return two-dimension associative array. See example.

## Example

```bash
$ composer require pmswga/kenv
```

```php
<?php

    require_once 'vendor/autoload.php';

    use pmswga\kenv\Env;

    $env = Env::parse_env_file('.env');

    print_r($env);
```
Run with PHP:

```bash
$ php -f index.php

Array
(
    [APP_NAME] => Laravel
    [APP_ENV] => local
    [APP_KEY] => base64:mtlb8hldh5hZ0GlLzbhInsV531MSylspRI4JsmwVal8=
    [APP_DEBUG] => true
    [APP_URL] => http://localhost
    [APP_12] => asfasf
    [LOG_CHANNEL] => stack
    [LOG_DEPRECATIONS_CHANNEL] => null
    [LOG_LEVEL] => debug
    [DB_CONNECTION] => mysql
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 3306
    [DB_DATABASE] => laravel
    [DB_USERNAME] => root
    [DB_PASSWORD] =>
    [BROADCAST_DRIVER] => log
    [CACHE_DRIVER] => file
    [FILESYSTEM_DISK] => local
    [QUEUE_CONNECTION] => sync
    [SESSION_DRIVER] => file
    [SESSION_LIFETIME] => 120
    [MEMCACHED_HOST] => 127.0.0.1
    [REDIS_HOST] => 127.0.0.1
    [REDIS_PASSWORD] => null
    [REDIS_PORT] => 6379
    [MAIL_MAILER] => smtp
    [MAIL_HOST] => mailhog
    [MAIL_PORT] => 1025
    [MAIL_USERNAME] => null
    [MAIL_PASSWORD] => null
    [MAIL_ENCRYPTION] => null
    [MAIL_FROM_ADDRESS] => null
    [MAIL_FROM_NAME] => ${APP_NAME}
    [AWS_ACCESS_KEY_ID] =>
    [AWS_SECRET_ACCESS_KEY] =>
    [AWS_DEFAULT_REGION] => us-east-1
    [AWS_BUCKET] =>
    [AWS_USE_PATH_STYLE_ENDPOINT] => false
    [PUSHER_APP_ID] =>
    [PUSHER_APP_KEY] =>
    [PUSHER_APP_SECRET] =>
    [PUSHER_APP_CLUSTER] => mt1
    [MIX_PUSHER_APP_KEY] => ${PUSHER_APP_KEY}
    [MIX_PUSHER_APP_CLUSTER] => ${PUSHER_APP_CLUSTER}
)
```

Run with KPHP:

```bash
# 1. Compile
$ kphp --composer-root $(pwd) --mode cli example.php
# 2. Execute
$ ./kphp_out/cli
```