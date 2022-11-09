<?php
	declare(strict_types=1);
	namespace Pmswg\Kenv;
	
	class Env
	{
		
		static public function parse_env_string(string $env_string) : array
		{
			$content_lines = explode("\n", $env_string);

			if (empty($content_lines)) {
				return [];
			}

			$lines = [];

			foreach ($content_lines as $content_line) {
				$line = clear_string($content_line);

				if (!empty($line)) {
					$lines []= $line;
				}
			}

			$env = [];

			foreach ($lines as $line) {
				if (!validate_env_entry($line)) {
					throw new \RuntimeException('Error env file format');
				}

				$env_var = explode("=", $line, 2);

				if (count($env_var) !== 2) {
					throw new \RuntimeException('Error env file format');
				}

				$env[$env_var[0]] = clear_string($env_var[1]);
			}

			return $env;
		}
		
		static public function parse_env_file(string $filename) : array
		{			
			if (!is_file($filename) && !file_exists($filename)) {
				throw new \RuntimeException('File is not exists');
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
				$line = EnvParseHelper::clear_string($content_line);

				if (!empty($line)) {
					$lines []= $line;
				}
			}

			$env = [];

			foreach ($lines as $line) {
				if (!EnvParseHelper::validate_env_entry($line)) {
					throw new \RuntimeException('Error env file format');
				}

				$env_var = explode("=", $line, 2);

				if (count($env_var) !== 2) {
					throw new \RuntimeException('Error env file format');
				}

				$env[$env_var[0]] = EnvParseHelper::clear_string($env_var[1]);
			}

			return $env;
		}
		
	}
