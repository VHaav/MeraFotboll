<?php

namespace Anax\HTMLForm;

/**
 * Anax base class for wrapping sessions.
 *
 */
class CFormTestFlash extends \Mos\HTMLForm\CForm
{
    use \Anax\DI\TInjectionaware,
        \Anax\MVC\TRedirectHelpers;

    /**
     * Constructor
     *
     */
    public function __construct()
    {
        parent::__construct([], [            
            'submit1' => [
                'value'     => 'Flash Info',
                'type'      => 'submit',
                'callback'  => [$this, 'callbackFlashInfoSubmit'],
            ],
            'submit2' => [
                'value'     => 'Flash Success',
                'type'      => 'submit',
                'callback'  => [$this, 'callbackFlashSuccessSubmit'],
            ],
            'submit3' => [
                'value'     => 'Flash Failed',
                'type'      => 'submit',
                'callback'  => [$this, 'callbackFlashFailedSubmit'],
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
    public function callbackFlashInfoSubmit()
    {
        $this->di->flasher->createFlash('This is a Flash info-message!', 'info');
        return true;
    }
    
    public function callbackFlashSuccessSubmit()
    {
        $this->di->flasher->createFlash('This is a Flash success-message!', 'success');
        return true;
    }
    
    public function callbackFlashFailedSubmit()
    {        
        $this->di->flasher->createFlash('This is a Flash failed-message!', 'failed');
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
        $this->redirectTo();
    }



    /**
     * Callback What to do when form could not be processed?
     *
     */
    public function callbackFail()
    {
        $this->redirectTo();
    }
}
