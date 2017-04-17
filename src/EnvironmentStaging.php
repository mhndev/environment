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
     * @param $name
     * @param bool $show_errors
     * @param bool $show_error_trace
     * @param null $config_path
     */
    public function __construct(
        $name,
        $show_errors = false,
        $show_error_trace = false,
        $config_path = null
    )
    {
        parent::__construct(self::STAGING, false, false, $config_path);
    }

}
