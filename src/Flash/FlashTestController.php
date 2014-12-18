<?php

namespace Anax\Flash;

class FlashTestController
{
    use \Anax\DI\TInjectionaware,
        \Anax\MVC\TRedirectHelpers; 
        
    public function testAction()
    {
        $this->di->session();
        
        $form = new \Anax\HTMLForm\CFormTestFlash();
        $form->setDI($this->di);
        $form->check();
     
        $this->di->views->add('flash/flash', [
            'title' => 'Test FlashInfo',
            'form' => $form->getHTML(),
            'flash' => $this->di->flasher->getMessageHTML()
        ]);
    }
    
}