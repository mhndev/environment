<?php
namespace mhndev\environment;

use mhndev\environment\interfaces\iEnvironment;

/**
 * Class Environment
 * @package mhndev\environment
 */
class Environment implements iEnvironment
{

    const PRODUCTION = 'production';
    const TEST       = 'test';
    const STAGING    = 'staging';
    const DEVELOP    = 'develop';


    /**
     * @var string
     */
    protected $name;

    /**
     * @var boolean
     */
    protected $show_errors;


    /**
     * @var boolean
     */
    protected $show_error_trace;

    /**
     * @var string
     */
    protected $config_path;

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
        $this->name = $name;
        $this->show_errors = $show_errors;
        $this->show_error_trace = $show_error_trace;
        $this->config_path = $config_path;
    }

    /**
     * @param array $options
     * @return static
     */
    public static function fromArray(array $options)
    {
        return new static(
            $options['name'] ?? self::PRODUCTION,
            $options['show_errors'] ?? false,
            $options['show_error_trace'] ?? false,
            $options['config_path'] ?? null
        );
    }


    /**
     * @return string
     */
    function getName()
    {
        return $this->name;
    }


    /**
     * @return bool
     */
    public function isShowErrors()
    {
        return $this->show_errors;
    }

    /**
     * @return bool
     */
    public function isShowErrorTrace()
    {
        return $this->show_error_trace;
    }

    /**
     * @return string
     */
    public function getConfigPath()
    {
        return $this->config_path;
    }

}
