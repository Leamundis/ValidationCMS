<?php
/**
 *
 */
class ViewController
{
    static public function home() 
    {
        ConnectionHelper::checkConnectedUser();
        $page = new PageModel();
        echo TemplateHelper::createTemplate('home', $page->getOne('title', 'Home'));
    }

    static public function contact() 
    {
        $page = new PageModel();
        echo TemplateHelper::createTemplate('contact', $page->getOne('title', 'Contact'));
    }

    static public function edit() 
    {
        $page = new PageModel();
        echo TemplateHelper::createEdit($page->getAll());
    }

    static public function update() 
    {
        $articleTitle = $_POST['title'];
        $page = new PageModel();
        echo TemplateHelper::createUpdate($page->getOne('title', $articleTitle));
    }
}

