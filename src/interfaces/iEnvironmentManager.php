<?php
namespace mhndev\environment\interfaces;

/**
 * Interface iEnvironmentManager
 * @package mhndev\environment
 */
interface iEnvironmentManager
{

    /**
     * @return iEnvironment
     */
    function getDefaultEnvironment();

    /**
     * @param iEnvironment $environment
     * @return $this
     */
    function forceEnvironment(iEnvironment $environment);

    /**
     * @return iEnvironment
     */
    function getActiveEnvironment();


    /**
     * @return iEnvironment | null
     */
    function fromServerGlobals();

    /**
     * @param string $name
     * @return iEnvironmentManager|null
     */
    function fromPhpIni($name = 'php.environment');

}
