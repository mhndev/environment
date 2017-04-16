<?php
namespace mhndev\environment;

/**
 * Class EnvironmentTest
 * @package mhndev\environment
 */
class EnvironmentTest extends Environment
{

    /**
     * EnvironmentTest constructor.
     * @param string | null $config_path
     */
    public function __construct($config_path = null)
    {
        parent::__construct(self::TEST, false, false, $config_path);
    }

}
