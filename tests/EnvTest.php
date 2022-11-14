<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use pmswga\kenv\Env;

class EnvTest extends TestCase
{

    private array $source_env = [
        'APP_NAME' => 'Laravel',
        'APP_ENV' => 'local',
        'APP_KEY' => 'base64:mtlb8hldh5hZ0GlLzbhInsV531MSylspRI4JsmwVal8=',
        'APP_DEBUG' => 'true',
        'APP_URL' => 'http://localhost',
        'LOG_CHANNEL' => 'stack',
        'LOG_DEPRECATIONS_CHANNEL' => 'null',
        'LOG_LEVEL' => 'debug',
        'DB_CONNECTION' => 'mysql',
        'DB_HOST' => '127.0.0.1',
        'DB_PORT' => '3306',
        'DB_DATABASE' => 'laravel',
        'DB_USERNAME' => 'root',
        'DB_PASSWORD' => '',
        'BROADCAST_DRIVER' => 'log',
        'CACHE_DRIVER' => 'file',
        'FILESYSTEM_DISK' => 'local',
        'QUEUE_CONNECTION' => 'sync',
        'SESSION_DRIVER' => 'file',
        'SESSION_LIFETIME' => '120',
        'MEMCACHED_HOST' => '127.0.0.1',
        'REDIS_HOST' => '127.0.0.1',
        'REDIS_PASSWORD' => 'null',
        'REDIS_PORT' => '6379',
        'MAIL_MAILER' => 'smtp',
        'MAIL_HOST' => 'mailhog',
        'MAIL_PORT' => '1025',
        'MAIL_USERNAME' => 'null',
        'MAIL_PASSWORD' => 'null',
        'MAIL_ENCRYPTION' => 'null',
        'MAIL_FROM_ADDRESS' => 'null',
        'MAIL_FROM_NAME' => '${APP_NAME}',
        'AWS_ACCESS_KEY_ID' => '',
        'AWS_SECRET_ACCESS_KEY' => '',
        'AWS_DEFAULT_REGION' => 'us-east-1',
        'AWS_BUCKET' => '',
        'AWS_USE_PATH_STYLE_ENDPOINT' => 'false',
        'PUSHER_APP_ID' => '',
        'PUSHER_APP_KEY' => '',
        'PUSHER_APP_SECRET' => '',
        'PUSHER_APP_CLUSTER' => 'mt1',
        'MIX_PUSHER_APP_KEY' => '${PUSHER_APP_KEY}',
        'MIX_PUSHER_APP_CLUSTER' => '${PUSHER_APP_CLUSTER}',
    ];

    public function testParseEnvFile()
    {
        $this->assertEquals($this->source_env, Env::parse_env_file('.env.example'));
    }

    public function testParseEnvString()
    {
        $env_string = '';

        foreach ($this->source_env as $key => $value) {
            $env_string .= $key . " = " . $value;
            $env_string .= "\n";
        }

        $this->assertTrue(true);
        $this->assertEquals($this->source_env, Env::parse_env_string($env_string));
    }

}