<?php
class Application_Api_Util_Bootstrap
{
    /**
     * Resource ArrayObject contains all bootstrap classes
     *
     * @return Zend_Application_Bootstrap_Bootstrap
     */
    public static function getBootstrap()
    {
        $front = Zend_Controller_Front::getInstance();
        return $front->getParam('bootstrap');
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