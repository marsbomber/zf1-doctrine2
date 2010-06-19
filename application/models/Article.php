<?php

/**
 * @Entity
 * @Table(name="article")
 */
class Application_Model_Article
{

    /**
     * @Id @Column(name="id", type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Column(name="title", type="string")
     */
    private $title;

    /**
     * @return string   the article title
     */
    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

}

