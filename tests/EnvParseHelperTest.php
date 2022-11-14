<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use pmswga\kenv\EnvParseHelper;

class EnvParseHelperTest extends TestCase
{

    public function testIsCommentEnv()
    {
        $this->assertTrue(EnvParseHelper::isCommentEnv("#APP_NAME"));
        $this->assertNotTrue(EnvParseHelper::isCommentEnv("APP_NAME"));
    }

    public function testIsEnvVar()
    {
        $this->assertTrue(EnvParseHelper::isEnvVar("APP_NAME"));
        $this->assertTrue(EnvParseHelper::isEnvVar("MYVALUE"));
        $this->assertTrue(EnvParseHelper::isEnvVar("APP_DEBUG_OF_MY_BEST_APPLICATION_1"));
        $this->assertTrue(EnvParseHelper::isEnvVar("APP_DEBUG_OF_MY_BEST_APPLICATION_!@#$%^&*()-+"));
        $this->assertNotTrue(EnvParseHelper::isEnvVar("_VALUE_"));
        $this->assertNotTrue(EnvParseHelper::isEnvVar("!_VALUE_"));
        $this->assertNotTrue(EnvParseHelper::isEnvVar("12!_VALUE_"));
        $this->assertNotTrue(EnvParseHelper::isEnvVar("!12_VALUE_"));
    }

    public function testIsEnvEq()
    {
        $this->assertTrue(EnvParseHelper::isEnvEq("="));
        $this->assertNotTrue(EnvParseHelper::isEnvEq("$#"));
    }

    public function testIsEnvVal()
    {
        $this->assertTrue(EnvParseHelper::isEnvVal("Laravel"));
        $this->assertTrue(EnvParseHelper::isEnvVal("https://localhost"));
        $this->assertTrue(EnvParseHelper::isEnvVal("base64:mtlb8hldh5hZ0GlLzbhInsV531MSylspRI4JsmwVal8="));
        $this->assertTrue(EnvParseHelper::isEnvVal("127.0.0.1"));
        $this->assertTrue(EnvParseHelper::isEnvVal("80"));
        $this->assertTrue(EnvParseHelper::isEnvVal('"ENV OPTION"'));
        $this->assertTrue(EnvParseHelper::isEnvVal("'ENV OPTION'"));
    }

    public function testClearString()
    {
        $this->assertEquals("APP_NAME=MY_TEST_APP_NAME", EnvParseHelper::clearString("    APP_NAME    =     MY_TEST_APP_NAME"));
        $this->assertEquals("APP_NAME=Laravel", EnvParseHelper::clearString(" APP_NAME=Laravel "));
        $this->assertEquals("APP_DEBUG=true", EnvParseHelper::clearString("APP_DEBUG=true "));
        $this->assertEquals("APP_VERSION=1.0", EnvParseHelper::clearString(" APP_VERSION=1.0"));
        $this->assertEquals("MESSAGE=This is my message", EnvParseHelper::clearString('MESSAGE="This is my message"'));
        $this->assertEquals("MESSAGE=This is my message", EnvParseHelper::clearString("MESSAGE='This is my message'"));
    }
}
