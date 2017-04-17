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
     * @param array $options
     * @return mixed
     */
    public static function createEnvironment($env_name, array $options = [])
    {
        foreach (self::$namespaces as $namespace){
            if( class_exists($className = $namespace.'Environment'.ucfirst($env_name) ) ) {
                /** @var Environment $className */

                return $className::fromArray(array_merge(['name' => $env_name], $options));
            }

        }

        throw new InvalidArgumentException(sprintf(
            '%s environment does not exist', $env_name
        ));

    }


}
