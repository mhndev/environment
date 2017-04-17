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
    /**
     * Environment constructor.
     * @param $name
     * @param boolean $show_errors
     * @param boolean $show_error_trace
     * @param string $config_path
     */
    public function __construct(
        $name,
        $show_errors = false,
        $show_error_trace = false,
        $config_path = null
    )
    {
        parent::__construct(self::DEVELOP, true, true, $config_path);
    }

}
