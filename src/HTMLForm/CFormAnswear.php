<?php

namespace Anax\HTMLForm;

/**
 * Anax base class for wrapping sessions.
 *
 */
class CFormAnswear extends \Mos\HTMLForm\CForm
{
    use \Anax\DI\TInjectionaware,
        \Anax\MVC\TRedirectHelpers;

    /**
     * Constructor
     * Takes the id of the question that the answear belongs to
     */
    public function __construct($questionID = null)
    {        
        parent::__construct([], [            
            'text' => [ 
                'type'        => 'textarea', 
                'label'       => 'Svar',
                'required'    => true, 
                'validation'  => ['not_empty'],
            ],
            'questionID' => [ 
                'type'        => 'hidden', 
                'value'       => $questionID,
                'required'    => true, 
                'validation'  => ['not_empty'],
            ],
            'submit' => [
                'type'      => 'submit',
                'value'     => 'Send',
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
            'text' => $this->Value('text'),
            'questionID' => $this->Value('questionID'),
        ];       
        
        $this->di->dispatcher->forward([
            'controller' => 'answear',
            'action' => 'add-answear',
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
