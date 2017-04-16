<?php
namespace mhndev\environment;

/**
 * Class EnvironmentStaging
 * @package mhndev\environment
 */
class EnvironmentStaging extends Environment
{

    /**
     * EnvironmentStaging constructor.
     * @param string | null $config_path
     */
    public function __construct($config_path = null)
    {
        parent::__construct(self::STAGING, false, false, $config_path);
    }

}
