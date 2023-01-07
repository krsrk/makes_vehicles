<?php
use App\Utils\Configuration\Env;

if (! function_exists('env_var')) {
    function env_var(string $varName, $fallBackValue = '')
    {
        $envVarValue = $fallBackValue;

        if (! empty($_ENV[$varName])) {
            $checkIfValIsBool = Env::checkIfValueIsBoolean($_ENV[$varName]);
            $envVarValue = ($checkIfValIsBool['result']) ? $checkIfValIsBool['value'] : $_ENV[$varName];
        }

        return $envVarValue;
    }
}