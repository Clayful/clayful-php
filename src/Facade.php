<?php

namespace Clayful;

use Clayful\Clayful as ClayfulBase;
use Exception;

class Facade
{
    public static function request($modelName = null, $methodName = null, ...$arguments)
    {
        ClayfulBase::config(['client' => config('clayful.token')]);

        $model = "Clayful\\{$modelName}";

        if (!$modelName && !$methodName) {
            throw new Exception('Missing arguments. modelName or methodName is required.');
        }

        if (!class_exists($model)) {
            throw new Exception("{$modelName} model not found.");
        }

        if (!array_key_exists($methodName, $model::$apis)) {
            throw new Exception("{$methodName} method not exists in the {$modelName} model.");
        }

        return $model::$methodName(...$arguments);        
    }
}
