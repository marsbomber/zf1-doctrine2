<?php

class Admin_IndexController extends Zend_Controller_Action
{

    /*
     * @var instance of Doctrine\ORM\EntityManager
     */
    protected $_em;

    public function init()
    {
        $this->_em = Admin_Api_Util_Bootstrap::getResource('Entitymanagerfactory');

        //var_dump($this->_em);
    }

    public function indexAction()
    {
        // create new admin article
        $adminArticle = new Admin_Model_Article();
        $adminArticle->setTitle('admin article');
        $this->_em->persist($adminArticle);
        $this->_em->flush();



        // retrieve a collection of articles
        $articles = $this->_em->getRepository('Admin_Model_Article')->findAll();
        var_dump($articles);


        // delete all admin articles
        $this->_em->remove($adminArticle);
        $this->_em->flush();
    }



    public function testAction()
    {
        $option = Admin_Api_Util_Bootstrap::getOption('user');
        var_dump($option);
        exit;
    }


}

