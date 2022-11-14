<?php

namespace pmswga\kenv;
	
class EnvParseHelper
{

    /**
     * @param string|false|null $env
     * @return bool
     */
    public static function isCommentEnv(string $env) : bool
    {
        return preg_match("/^#/", $env) > 0;
    }

    /**
     * @param string|false|null $env_var
     * @return bool
     */
    public static function isEnvVar(string $env_var) : bool
    {
        return preg_match("/^[A-Z]+[A-Z\d\W_]*$/", $env_var) > 0;
    }

    /**
     * @param string|false|null $env_eq
     * @return bool
     */
    public static function isEnvEq(string $env_eq) : bool
    {
        return $env_eq === '=';
    }

    /**
     * @param string|false|null $env_value
     * @return bool
     */
    public static function isEnvVal(string $env_value) : bool
    {
        return preg_match("/(.*\n(?=[A-Z])|.*$)/", $env_value) > 0;
    }

    /**
     * @param string|false|null $str
     * @return string|false|null
     */
    public static function clearString(string $str) : string
    {
        $pure_string = trim($str);
        $pure_string = preg_replace('/ += +/', '=', $pure_string);
        $pure_string = str_replace('"', '', $pure_string);
        $pure_string = str_replace("'", '', $pure_string);

        return $pure_string;
    }

}
