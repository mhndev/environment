<?php
namespace mhndev\environment;

use mhndev\environment\interfaces\iEnvironment;
use mhndev\environment\interfaces\iEnvironmentManager;

/**
 * Class EnvironmentManager
 * @package mhndev\environment
 */
class EnvironmentManager implements iEnvironmentManager
{

    /**
     * @var iEnvironment
     */
    protected $activeEnvironment;

    /**
     * @var array of strings (name of environment)
     */
    protected $valid_environments;

    /**
     * @var iEnvironment
     */
    protected $default_environment;


    /**
     * EnvironmentManager constructor.
     *
     * @param $default_environment
     */
    public function __construct($default_environment = Environment::PRODUCTION)
    {
        $this->default_environment = $default_environment;

        $this->valid_environments  = [
            Environment::PRODUCTION,
            Environment::DEVELOP,
            Environment::TEST,
            Environment::STAGING
        ];

        if(!empty($this->fromServerGlobals()) ) {
            $this->forceEnvironment($this->fromServerGlobals());
        }

        elseif (!empty($this->fromPhpIni())){
            $this->forceEnvironment($this->fromPhpIni());
        }

        else {
            $this->activeEnvironment = new Environment(
                $default_environment,
                false,
                false,
                null
            );
        }
    }


    /**
     * @return iEnvironment
     */
    function getDefaultEnvironment()
    {
        return $this->default_environment;
    }

    /**
     * @param iEnvironment $environment
     * @return $this
     */
    function forceEnvironment(iEnvironment $environment)
    {
        $this->activeEnvironment = $environment;

        return $this;
    }

    /**
     * @return iEnvironment
     */
    function getActiveEnvironment()
    {
        return $this->activeEnvironment;
    }

    /**
     * @param string $name
     * @return iEnvironment|null
     */
    function fromServerGlobals($name = 'php_environment_name')
    {
        if (isset($_SERVER[$name] ) ) {
            return new Environment(
                $_SERVER[$name],
                $_SERVER['php_'.$_SERVER[$name].'_show_errors'],
                $_SERVER['php_'.$_SERVER[$name].'_show_error_trace'],
                $_SERVER['php_'.$_SERVER[$name].'config_path']
            );
        }
        else{
            return null;
        }
    }

    /**
     * @param string $name
     * @return iEnvironment | null
     */
    function fromPhpIni($name = 'php.environment.name')
    {
        $environment_name = get_cfg_var($name);

        if ($environment_name !== false) {
            return new Environment(
                $environment_name,
                get_cfg_var('php.'.$environment_name.'.show_errors'),
                get_cfg_var('php.'.$environment_name.'.show_error_trace'),
                get_cfg_var('php.'.$environment_name.'.config_path')
            );
        }

        else{
            return null;
        }
    }

}
