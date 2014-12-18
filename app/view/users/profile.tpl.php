<h1><?=$title?></h1>
 
<div class="divUser">
<?php $grav_url = 'http://www.gravatar.com/avatar/' . md5(strtolower(trim($user->email))) . '.jpg?s=100'; ?>
<div class="user_info">
<img src="<?=$grav_url?>"/>
<p>Användare: <?=$user->acronym?></p>
<p>Namn: <?=$user->name?></p>
<p>Email: <?=$user->email?></p>
</div>

<div class="asked_questions">
    <h3>Ställda frågor:</h3>
    <?php
        foreach($questions as $question){
            echo <<<EOD
                <a href="{$this->di->url->create("comment/select-comment/{$question->id}")}"><p>{$question->title} - {$question->timestamp}</p></a>
EOD;
        }
    ?>
</div>

<div class="answered_questions">
    <h3>Besvarade frågor:</h3>
    <?php
        foreach($answearedQuestions as $aq){
            echo <<<EOD
                <a href="{$this->di->url->create("comment/select-comment/{$aq->id}")}"><p>{$aq->title} - {$aq->timestamp}</p></a>
EOD;
        }
    ?>
</div>

<a href="<?=$this->url->create('users/update-form/' . $user->id) ?>"><i class="fa fa-pencil-square-o"></i> Uppdatera Profil </a><br>
<a href="<?=$this->url->create('users/logout')?>"><i class="fa fa-sign-out"></i> logout</a>
</div>