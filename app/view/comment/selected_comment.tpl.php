<div class="divComments">
    <div class="divQuestion">
        <p><?=$this->textFilter->doFilter($question->message, 'shortcode, markdown');?></p>
        <p class="fine-text"><?=$question->timestamp?></p>
        <div class="tags">
            <?php 
                foreach($tags as $tag){
                    echo "<a href='{$this->url->create("comment/get-comments-by-tag/{$tag->tag}")}'><div class='single_tag'>{$tag->tag}</div></a>";
                }
            ?>
        </div>
        <?php $grav_url = 'http://www.gravatar.com/avatar/' . md5(strtolower(trim($user->email))) . '.jpg?s=25'; ?>
        <a href=<?=$this->di->url->create("users/id/{$user->id}")?>>
            <div class="user_stamp">                
                <img src="<?=$grav_url?>"/>
                <?=$user->acronym?>
            </div>
        </a>
    </div>
    <div class="divQuestionComments">
        <?php if (isset($comments) && is_array($comments)) : ?>
            <?php foreach($comments as $comment) : ?>
                <?php $grav_url = 'http://www.gravatar.com/avatar/' . md5(strtolower(trim($comment->tempUser->email))) . '.jpg?s=25'; ?>
                <div class="divCommentComment">
                    <p><?=$this->textFilter->doFilter($comment->text, 'shortcode, markdown');?></p>
                    <p class="fine-text"><?=$comment->created?></p>
                    <a href=<?=$this->di->url->create("users/id/{$comment->tempUser->id}")?>>
                        <div class="user_stamp">
                            <img src="<?=$grav_url?>"/>
                            <?=$comment->tempUser->acronym?>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    
    <form class="commentcommentForm" method="post">
        <input type="hidden" name="questionID" value="<?=$id?>"/>
        <textarea name="comment" rows="3" cols="70" required></textarea>
        <p><input type="submit" name="doComment" value="Kommentera" onclick="this.form.action='<?=$this->url->create("comment-comment/add-comment-to-question") ?>'"/></p>
    </form>
    
    <div class="divQuestionAnswears">
        <?php if (isset($answears) && is_array($answears)) : ?>
            <?php foreach($answears as $answear) : ?>
                <?php $grav_url = 'http://www.gravatar.com/avatar/' . md5(strtolower(trim($answear->tempUser->email))) . '.jpg?s=25'; ?>
                <div class="divAnswear" id="<?=$answear->id?>">
                    
                    <p><?=$this->textFilter->doFilter($answear->text, 'shortcode, markdown');?></p>
                    <p class="fine-text"><?=$answear->created?></p>
                    <a href=<?=$this->di->url->create("users/id/{$answear->tempUser->id}")?>>
                        <div class="user_stamp">
                            <img src="<?=$grav_url?>"/>
                            <?=$answear->tempUser->acronym?>
                        </div>
                    </a>
                </div>
                
                <?php if (isset($answear->comments) && is_array($answear->comments)) : ?>
                    <?php foreach($answear->comments as $comment) : ?>
                        <?php $grav_url = 'http://www.gravatar.com/avatar/' . md5(strtolower(trim($comment->tempUser->email))) . '.jpg?s=25'; ?>
                        <div class="divCommentComment">
                            <p><?=$this->textFilter->doFilter($comment->text, 'shortcode, markdown');?></p>
                            <p class="fine-text"><?=$comment->created?></p>
                            <a href=<?=$this->di->url->create("users/id/{$comment->tempUser->id}")?>>
                                <div class="user_stamp">
                                    <img src="<?=$grav_url?>"/>
                                    <?=$comment->tempUser->acronym?>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>                
                        
                <form class="commentcommentForm" method="post">
                    <input type="hidden" name="answearID" value="<?=$answear->id?>"/>
                    <input type="hidden" name="questionID" value="<?=$id?>"/>
                    <textarea name="comment" rows="3" cols="70" required></textarea>
                    <p><input type="submit" name="doSaveComment" value="Kommentera" onclick="this.form.action='<?=$this->url->create("comment-comment/add-comment-to-answear") ?>'" /></p>
                </form>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    
    <div class="divAnswear_form">
        <form class="answear_form" method="post">
            <fieldset>
                <legend>Skriv ett svar</legend>
                <input type="hidden" name="questionID" value="<?=$id?>"/>
                <textarea name="text" rows="3" cols="70" required></textarea><br>
                <input class="btnAnswear" type="submit" name="doAnswear" value="Besvara" onclick="this.form.action='<?=$this->url->create("answear/add-answear") ?>'"/>
            </fieldset>
        </form>
    </div>
</div>
