<?php
class Admin_Api_Util_Bootstrap
{
    const MODULE = 'admin';

    /**
     * Modules resource ArrayObject contains all bootstrap classes
     * then get the bootstrap for this module
     *
     * @return Zend_application_Module_Bootstrap
     */
    public static function getBootstrap()
    {
        $front = Zend_Controller_Front::getInstance();
        $bootstrap = $front->getParam('bootstrap');
        return $bootstrap->getResource('modules')->offsetGet(self::MODULE);
    }

    /**
     * Get an item from the bootstrap container (Registry)
     * @param string $item
     * @return mixed
     */
    public static function getItem($item)
    {
        $bootstrap = self::getBootstrap();
        return $bootstrap->getContainer()->$item;
    }

    /**
     * Get a resource
     * @param string $resource
     * @return mixed
     */
    public static function getResource($resource)
    {
        $bootstrap = self::getBootstrap();
        return $bootstrap->getResource($resource);
    }

    /**
     * Get a bootstrap option
     *
     * @param string $option
     * @return mixed
     */
    public static function getOption($option)
    {
        $bootstrap = self::getBootstrap();
        return $bootstrap->getOption($option);
    }
}