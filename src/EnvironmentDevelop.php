<?php
namespace mhndev\environment;

/**
 * Class EnvironmentDevelop
 * @package mhndev\environment
 */
class EnvironmentDevelop extends Environment
{

    /**
     * EnvironmentProduction constructor.
     * @param string | null $config_path
     */
    public function __construct($config_path = null)
    {
        parent::__construct(self::DEVELOP, true, true, $config_path);
    }

}
