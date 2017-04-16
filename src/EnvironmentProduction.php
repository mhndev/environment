<?php
namespace mhndev\environment;

/**
 * Class EnvironmentProduction
 * @package mhndev\environment
 */
class EnvironmentProduction extends Environment
{

    /**
     * EnvironmentProduction constructor.
     * @param string | null $config_path
     */
    public function __construct($config_path = null)
    {
        parent::__construct(self::PRODUCTION, false, false, $config_path);
    }

}
