<h1>Frågor</h1>
<!--<a href="<?=$this->url->create('setup/db')?>">Setup DB</a>-->
<?php if (is_array($comments)) : ?>
<div class='comments'>
<?php $counter = 0 ?>
<?php foreach ($comments as $comment) : ?>
<?php $counter++ ?>
<a class="no-decor" href="<?=$this->url->create("comment/select-comment/{$comment->id}")?>">
    <div class='single-comment'>
        <p><?=$comment->title?></p>
        <span>
            <p class='fine-text'><?=$comment->name?><br>
            <?=$comment->timestamp?></p>
        </span>
    </div>
</a>
<?php endforeach; ?>
</div>
<?php endif; ?>