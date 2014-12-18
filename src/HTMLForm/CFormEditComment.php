<?php

namespace Anax\HTMLForm;

/**
 * Anax base class for wrapping sessions.
 *
 */
class CFormEditComment extends \Mos\HTMLForm\CForm
{
    use \Anax\DI\TInjectionaware,
        \Anax\MVC\TRedirectHelpers;

    /**
     * Constructor
     *
     */
    public function __construct(array $tableValues = array())
    {
        $defaulValues = [
            'name' => '',
            'homepage' => '',
            'message' => ''
        ];
        
        $tableValues = array_merge($defaulValues, $tableValues);
        
        parent::__construct([], [
            'name' => [ 
                'type'        => 'text', 
                'label'       => 'Name',
                'value'       => $tableValues['name'],
                'required'    => true, 
                'validation'  => ['not_empty'],
            ], 
            'homepage' => [ 
                'type'        => 'text', 
                'label'       => 'Homepage',
                'value'       => $tableValues['homepage'],
                'required'    => false,
            ], 
            'message' => [ 
                'type'        => 'textarea', 
                'label'       => 'Message',
                'value'       => $tableValues['message'],
                'required'    => true, 
                'validation'  => ['not_empty'],
            ],
            'id' => [ 
                'type'        => 'hidden',
                'value'       => $tableValues['id'],
            ],
            'submit' => [
                'type'      => 'submit',
                'value'     => 'Save',
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
            'name' => $this->Value('name'), 
            'homepage' => $this->Value('homepage'), 
            'message' => $this->Value('message'),
            'id' => $this->Value('id'),
        ];
        $this->di->dispatcher->forward([
            'controller' => 'comment',
            'action' => 'edit',
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
