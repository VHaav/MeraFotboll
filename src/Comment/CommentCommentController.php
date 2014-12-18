<?php
namespace Anax\Comment;

class CommentCommentController extends \Anax\Comment\CommentController
{
    
    public function addCommentToQuestionAction()
    {
        $isPosted = $this->di->request->getPost('doComment');        
        if(!$isPosted){
            die("You took a wrong turn! Please go back!");
        }
        if($this->di->session->get('user') !== null) {
            $user = $this->di->session->get('user');
            $now = date('Y-m-d H:i:s');
            
            $questionID = $this->di->request->getPost('questionID');
            
            $this->commentcomments->save([
                'questionID' => $questionID,
                'text' => $this->di->request->getPost('comment'),
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
    
    public function addCommentToAnswearAction()
    {        
        $isPosted = $this->di->request->getPost('doSaveComment');        
        $questionID = $this->di->request->getPost('questionID');
        if($isPosted){
            if($this->di->session->get('user') !== null) {
                $user = $this->di->session->get('user');
                $answearID = $this->di->request->getPost('answearID');
                $now = date('Y-m-d H:i:s');
                
                $this->commentcomments->save([
                    'answearID' => $answearID,
                    'text' => $this->di->request->getPost('comment'),
                    'user' => $user->id,
                    'created' => $now            
                ]);
                $this->incrementUserActivityPoints();
            }
            else{
                $url = $this->di->url->create('form/login');
                $this->response->redirect($url);
            }
        }        
        
        $this->di->dispatcher->forward([
            'controller' => 'comment',
            'action' => 'select-comment',
            'params' => [$questionID]
        ]); 
    }
}