<?php
namespace mhndev\environment\interfaces;

/**
 * Interface iEnvironment
 * @package mhndev\environment
 */
interface iEnvironment
{

    /**
     * @return string
     */
    function getName();

    /**
     * @return bool
     */
    public function isShowErrors();

    /**
     * @return bool
     */
    public function isShowErrorTrace();

    /**
     * @return string
     */
    public function getConfigPath();


}
