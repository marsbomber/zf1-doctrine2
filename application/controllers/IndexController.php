<?php

class IndexController extends Zend_Controller_Action
{
    /**
     * EntityManager
     * 
     * @var instance of Doctrine\ORM\EntityManager
     */
    protected $_em;

    /**
     * FlashMessenger
     *
     * @var Zend_Controller_Action_Helper_FlashMessenger
     */
    protected $_flashMessenger = null;

    public function init()
    {
        // init doctrine entity manager
        $this->_em = Application_Api_Util_Bootstrap::getResource('Entitymanagerfactory');

        // init flash messenger
        $this->_flashMessenger = $this->_helper->getHelper('FlashMessenger');

        
    }

    public function indexAction()
    {
        // retrieve an article object
        $firstArticle = $this->_em->find('Application_Model_Article', 1);
        var_dump($firstArticle);

        // update article title
        $firstArticle->setTitle('Tested at: ' . Zend_Date::now());
        $this->_em->flush();

        // create a new article
        $newArticle = new Application_Model_Article();
        $newArticle->setTitle('Doctrine Rocks at: ' . Zend_Date::now());
        $this->_em->persist($newArticle);
        $this->_em->flush();

        // retrieve a collection of articles
        $articles = $this->_em->getRepository('Application_Model_Article')->findAll();
        var_dump($articles);


        // delete new article
        $this->_em->remove($newArticle);
        $this->_em->flush();

        // retrieve article object using DQL
        //$q = $this->_em->createQuery('select u from Application_Model_Article u where u.title = ?1');
        //$q->setParameter(1, 'test');
        //$article = $q->getSingleResult();
        //var_dump($article);
        
    }
}

