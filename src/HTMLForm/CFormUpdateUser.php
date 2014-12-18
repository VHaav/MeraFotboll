<?php

namespace Anax\HTMLForm;

/**
 * Anax base class for wrapping sessions.
 *
 */
class CFormUpdateUser extends \Mos\HTMLForm\CForm
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
            'acronym' => '',
            'name' => '',
            'email' => ''
        ];
        
        $tableValues = array_merge($defaulValues, $tableValues);
        
        parent::__construct([], [
            'acronym' => [ 
                'type'        => 'text', 
                'label'       => 'Akronym',
                'value'       => $tableValues['acronym'],
                'required'    => true, 
                'validation'  => ['not_empty'],
            ],
            'name' => [ 
                'type'        => 'text', 
                'label'       => 'Namn',
                'value'       => $tableValues['name'],
                'required'    => true, 
                'validation'  => ['not_empty'],
            ], 
            'email' => [ 
                'type'        => 'text',
                'value'       => $tableValues['email'],
                'required'    => true, 
                'validation'  => ['not_empty', 'email_adress'],
            ],
            'id' => [ 
                'type'        => 'hidden',
                'value'       => $tableValues['id'],
            ],
            'submit' => [
                'type'      => 'submit',
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
            'id' => $this->Value('id'),
            'acronym' => $this->Value('acronym'), 
            'name' => $this->Value('name'), 
            'email' => $this->Value('email')
        ];
        
        $this->di->dispatcher->forward([
            'controller' => 'users',
            'action' => 'update',
            'params' => [$params]
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
