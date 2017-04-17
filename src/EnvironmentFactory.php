<?php
namespace mhndev\environment;

use mhndev\environment\exceptions\InvalidArgumentException;

/**
 * Class EnvironmentFactory
 * @package mhndev\environment
 */
class EnvironmentFactory
{

    /**
     * @var array
     */
    protected static $namespaces = ['\mhndev\environment\\'];


    /**
     * @param $namespace
     */
    public static function registerNamespace($namespace)
    {
        self::$namespaces[] = $namespace;
    }


    /**
     * @param string $env_name
     * @return mixed
     */
    public static function createEnvironment($env_name)
    {
        foreach (self::$namespaces as $namespace){
            if( class_exists($className = $namespace.'Environment'.ucfirst($env_name) ) ) {
                return new $className();
            }

        }

        throw new InvalidArgumentException(sprintf(
            '%s environment does not exist', $env_name
        ));

    }


}
