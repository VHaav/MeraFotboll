<?php

namespace Anax\HTMLForm;

/**
 * Anax base class for wrapping sessions.
 *
 */
class CFormComment extends \Mos\HTMLForm\CForm
{
    use \Anax\DI\TInjectionaware,
        \Anax\MVC\TRedirectHelpers;

    /**
     * Constructor
     *
     */
    public function __construct()
    {
        parent::__construct(['class' => 'question_form'], [
            'title' => [ 
                'type'        => 'text', 
                'label'       => 'Titel', 
                'required'    => true, 
                'validation'  => ['not_empty'],
            ],
            'tag' => [ 
                'type'        => 'text', 
                'label'       => 'Tag (använd mellanslag för flera)', 
                'required'    => true, 
                'validation'  => ['not_empty'],
            ],
            'message' => [ 
                'type'        => 'textarea', 
                'label'       => 'Fråga',
                'required'    => true, 
                'validation'  => ['not_empty'],
            ],
            'submit' => [
                'type'      => 'submit',
                'value'     => 'Fråga',
                'callback'  => [$this, 'callbackSubmit'],
            ],
        ]);
    }



    /**
     * Customise the check() method.
     *
     * @param callable $callIfSuccess handler to call if function returns true.
     * @param callable $callIfFail    handler to call if function returns true.
     */
    public function check($callIfSuccess = null, $callIfFail = null)
    {
        return parent::check([$this, 'callbackSuccess'], [$this, 'callbackFail']);
    }



    /**
     * Callback for submit-button.
     *
     */
    public function callbackSubmit()
    {
        $this->saveInSession = true;
        
        $params = [
            'title' => $this->Value('title'),
            'tag' => $this->Value('tag'),
            'homepage' => $this->Value('homepage'), 
            'message' => $this->Value('message'),
        ];
        $this->di->dispatcher->forward([
            'controller' => 'comment',
            'action' => 'add',
            'params' => [$params]
        ]);
        
        return true;
    }
    
    /**
     * Callback for reset-button.
     *
     */
    public function callbackReset()
    {
        $this->di->dispatcher->forward([
            'controller' => 'comment',
            'action' => 'reset',
        ]);
        
        return true;
    }



    /**
     * Callback for submit-button.
     *
     */
    public function callbackSubmitFail()
    {
        $this->AddOutput("<p><i>DoSubmitFail(): Form was submitted but I failed to process/save/validate it</i></p>");
        return false;
    }



    /**
     * Callback What to do if the form was submitted?
     *
     */
    public function callbackSuccess()
    {
        $this->AddOutput("<p><i>Form was submitted and the callback method returned true.</i></p>");
        $this->redirectTo();
    }



    /**
     * Callback What to do when form could not be processed?
     *
     */
    public function callbackFail()
    {
        $this->AddOutput("<p><i>Form was submitted and the Check() method returned false.</i></p>");
        $this->redirectTo();
    }
}
