<?php
namespace Anax\DI;

class CDIFactory extends \Anax\DI\CDIFactoryDefault {
    
    public function __construct(){
        parent::__construct();
        
        $this->set('form', '\Mos\HTMLForm\CForm');
        $this->set('flasher', '\vhaa\FlashInfo\CFlashInfo');
        
        $this->set('FormController', function(){
                $controller = new \Anax\HTMLForm\FormController();
                $controller->setDI($this);
                return $controller;
        });
        
        $this->set('UsersController', function(){
                $controller = new \Anax\Users\UsersController();
                $controller->setDI($this);
                return $controller;
        });
        
        $this->set('CommentController', function(){
                $controller = new \Anax\Comment\CommentController();
                $controller->setDI($this);
                return $controller;
        });
        
        $this->set('CommentCommentController', function(){
                $controller = new \Anax\Comment\CommentCommentController();
                $controller->setDI($this);
                return $controller;
        });
        
        $this->set('AnswearController', function(){
                $controller = new \Anax\Comment\AnswearController();
                $controller->setDI($this);
                return $controller;
        });
        
        $this->set('FlashTestController', function(){
                $controller = new \Anax\Flash\FlashTestController();
                $controller->setDI($this);
                return $controller;
        });
        
        $this->setShared('db', function(){
                $db = new \Mos\Database\CDatabaseBasic();
                $db->setOptions(require ANAX_APP_PATH . 'config/database_mysql.php');
                $db->connect();
                return $db;
        });
        
        
    }
}