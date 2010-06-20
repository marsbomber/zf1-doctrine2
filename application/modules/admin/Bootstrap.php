<?php
class Admin_Bootstrap extends Zend_Application_Module_Bootstrap
{
    /**
     * Initialize module resources
     *
     * @return mixed registry items
     */
    protected function _initAutoload()
    {
        $autoloader = new Zend_Application_Module_Autoloader(array(
            'namespace' => 'Admin_',
            'basePath'  => dirname(__FILE__),
        ));

        // Add resource type for Module Api
        $autoloader->addResourceType('api','api/','Api');
        
        return $autoloader;
    }

    /**
     * Init config settings and resoure for this module
     *
     */
    protected function _initModuleConfig()
    {        
        // load ini file
        $iniOptions = new Zend_Config_Ini(dirname(__FILE__) . '/configs/module.ini', APPLICATION_ENV);
        $moduleIniOptions = $iniOptions->toArray();
        $this->setOptions($moduleIniOptions['admin']);
    }
    
}