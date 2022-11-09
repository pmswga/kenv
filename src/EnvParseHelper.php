<?php
	declare(strict_types=1);
	namespace pmswga\kenv;
	
	class EnvParseHelper
	{
		
		static public function validate_env_entry(string $env_entry) : bool
		{
			return preg_match('/(^[A-Z]+[A-Z\d_]*)=(.*\n(?=[A-Z])|.*$)/', $env_entry) > 0;
		}
		
		static public function clear_string(string $str) : string
		{
			$pure_string = ltrim($str);
			$pure_string = trim($pure_string);
			$pure_string = rtrim($pure_string);
			$pure_string = str_replace('"', '', $pure_string);

			return $pure_string;
		}
		
	}
