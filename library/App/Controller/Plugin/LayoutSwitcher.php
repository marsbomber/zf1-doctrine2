<?php

class App_Controller_Plugin_LayoutSwitcher extends Zend_Layout_Controller_Plugin_Layout
{
    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        if (strcmp($request->getModuleName(), 'default') !== 0) {
            $moduleLayoutPath = Zend_Controller_Front::getInstance()->getModuleDirectory() . '/layouts/scripts';
            if (file_exists($moduleLayoutPath . '/layout.phtml')) {
                $this->getLayout()->setLayoutPath($moduleLayoutPath);
            }
        } else {
            $applicationLayoutPath = APPLICATION_PATH . '/layouts/scripts';
            if (file_exists($applicationLayoutPath . '/layout.phtml')) {
                $this->getLayout()->setLayoutPath($applicationLayoutPath);
            }
        }
    }
}