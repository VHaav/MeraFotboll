<?php

namespace Anax\Comment;

/**
* Trait for methods used for comments/questions/answears controller classes
*
**/
trait TAccessCommon
{
    /**
    * Returns an array of answears for a specified question/comment
    * Takes the ID of the question/comment you want asnwears for
    **/
    public function getAnswearsByCommentID($commentID)
    {
        $answears = $this->answears->query()
            ->where("questionID = ?")
            ->execute([$commentID]);
        return $answears;
    }
    
    public function getCommentCommentsByCommentID($commentID)
    {
        $commentcomments = $this->commentcomments->query()
            ->where("questionID = ?")
            ->execute([$commentID]);
        return $commentcomments;
    }
    
    public function getCommentCommentsByAnswearID($answearID)
    {
        $commentcomments = $this->commentcomments->query()
            ->where("answear = ?")
            ->execute([$answearID]);
        return $commentcomments;
    }
    
    /**
    * Takes a array of answear objects, and fetches all comments belonging to the answears.
    * Adds the correct comments to the answear object.
    **/
    public function getAnswearComments($answears)
    {
        foreach($answears as $answear){
            $comments = $this->commentcomments->query()
                ->where("answearID = ?")
                ->execute([$answear->id]);
            $comments = $this->setTempUserObject($comments);
            $answear->comments = $comments;
        }
        return $answears;
    }
    
    public function getUserQuestions($id = null)
    {
        if(!isset($id)){
            die("Missing id!");
        }
        
        $questions = $this->comments->query()
            ->where('user = ?')
            ->execute([$id]);
            
        return $questions;
    }
    
    public function getUserAnswears($id = null)
    {
        if(!isset($id)){
            die("Missing id!");
        }
        
        $answears = $this->answears->query()
            ->where('user = ?')
            ->execute([$id]);
            
        return $answears;
    }
    
    /**
    * Fetches the questions for the given answears,
    * takes answear objects and returns the questions they belong to
    *
    **/
    public function getQuestionsForAnswears(array $answears)
    {
        $questionsToReturn = array();
        foreach($answears as $answear){
            $question = $this->comments->query()
                ->where('id = ?')
                ->execute([$answear->questionID]);
            $questionsToReturn[] = $question[0];
        }
        //die(dump($questionsToReturn));
        return $questionsToReturn;
    }
    
    public function setTempUserObject($objects)
    {
        $objectsToReturn = array();
        foreach($objects as $object){
            $tempUser = $this->users->query()
                ->where("id = ?")
                ->execute([$object->user]);
            $object->tempUser = $tempUser[0];
            $objectsToReturn[] = $object;
        }
        return $objectsToReturn;
    }
    
    public function incrementUserActivityPoints()
    {
        if($this->di->session->get('user') !== null){
            $user = $this->users->find($this->di->session->get('user')->id);
            $user->activityPoints++;
            $user->save();
        }
        else{
            die('You have to be logged in to perform this action! Please go back!');
        }
    }
    
    public function getMostActiveUsers()
    {
        $sql = "SELECT * FROM kmom07_user
                ORDER BY activityPoints DESC LIMIT 3;";
        $users =  $this->db->executeFetchAll($sql);
        //die(dump($users));
        return $users;
    }
    
    public function getRecentQuestions()
    {
        $sql = "SELECT * FROM kmom07_comment
                ORDER BY timestamp DESC LIMIT 3;";
        $questions =  $this->db->executeFetchAll($sql);
        return $questions;
    }
    
    public function getPopularTags()
    {
        $sql = "SELECT *, count(tag) AS nr 
                FROM kmom07_tag 
                GROUP BY tag 
                ORDER BY nr DESC 
                LIMIT 3;";
        $tags =  $this->db->executeFetchAll($sql);
        return $tags;
    }
}