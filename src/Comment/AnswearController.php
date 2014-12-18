<?php
namespace Anax\Comment;

class AnswearController extends \Anax\Comment\CommentController
{
    
    public function answearFormAction($id, \Anax\HTMLForm\CFormAnswear $form)
    {
        $question = $this->getCommentByIDAction($id);
        $questionMessage = ($question) ? $question->message : die("No such question exists!");
        
        $this->di->theme->setTitle("Besvara frågan");
        $this->di->views->add('comment/answear_comment', [
            'question' => $questionMessage,
            'form' => $form->getHTML()
        ]);
    }
    
    public function addAnswearAction()
    {
        if($this->di->request->getPost('doAnswear') === null){
            die("Could not add answear, please go back!");
        }
        if($this->di->session->get('user') !== null) {
            $user = $this->di->session->get('user');
            $now = date('Y-m-d H:i:s');
            $questionID = $this->di->request->getPost('questionID');
            
            $this->answears->create([
                'questionID' =>  $questionID,
                'text' => $this->di->request->getPost('text'),
                'user' => $user->id,
                'created' => $now
            ]);
            $this->incrementUserActivityPoints();
            $this->di->dispatcher->forward([
                'controller' => 'comment',
                'action' => 'select-comment',
                'params' => [$questionID]
            ]);
        }
        else{
            $url = $this->di->url->create('form/login');
            $this->response->redirect($url);
        }
    }
}