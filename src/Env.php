<?php

namespace pmswga\kenv;
	
class Env
{

    /**
     * @param string|false $env_string
     * @throws \RuntimeException
     * @return array
     */
    public static function parse_env_string(string $env_string) : array
    {
        $content_lines = explode("\n", $env_string);

        if (empty($content_lines)) {
            return [];
        }

        $lines = [];

        foreach ($content_lines as $content_line) {
            $line = EnvParseHelper::clearString($content_line);

            if (!empty($line)) {
                $lines []= $line;
            }
        }

        $env = [];

        foreach ($lines as $line) {
            $env_var = explode("=", $line, 2);

            if (count($env_var) !== 2) {
                throw new \RuntimeException('Error env file format');
            }

            if (!EnvParseHelper::isEnvVar($env_var[0])) {
                throw new \RuntimeException('Invalid format of env option ' . $env_var[0] . "=" . $env_var[1]);
            }

            if (!EnvParseHelper::isEnvVal($env_var[1])) {
                throw new \RuntimeException('Invalid format of env option' . $env_var[0] . "=" . $env_var[1]);
            }

            $env[$env_var[0]] = EnvParseHelper::clearString($env_var[1]);
        }

        return $env;
    }

    /**
     * @param string|false $filename
     * @throws \RuntimeException
     * @return array
     */
    public static function parse_env_file(string $filename) : array
    {
        if (!is_file($filename) && !file_exists($filename)) {
            throw new \RuntimeException("File doesn't exist");
        }

        $content = file_get_contents($filename);

        if (empty($content)) {
            return [];
        }

        $content_lines = explode("\n", $content);

        if (empty($content_lines)) {
            return [];
        }

        $lines = [];

        foreach ($content_lines as $content_line) {
            $line = EnvParseHelper::clearString($content_line);

            if (!empty($line) && !EnvParseHelper::isCommentEnv($line)) {
                $lines []= $line;
            }
        }

        $env = [];

        foreach ($lines as $line) {
            $env_var = explode("=", $line, 2);

            if (count($env_var) !== 2) {
                throw new \RuntimeException('Error env file format');
            }

            if (!EnvParseHelper::isEnvVar($env_var[0])) {
                throw new \RuntimeException('Invalid format of env option ' . $env_var[0] . "=" . $env_var[1]);
            }

            if (!EnvParseHelper::isEnvVal($env_var[1])) {
                throw new \RuntimeException('Invalid format of env option' . $env_var[0] . "=" . $env_var[1]);
            }

            $env[$env_var[0]] = EnvParseHelper::clearString($env_var[1]);
        }

        return $env;
    }

}
