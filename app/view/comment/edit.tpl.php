<h2>Edit</h2>
<div class='comment-form'>
    <form method=post>
        <input type='hidden' name='redirect' value='<?=$this->url->create("{$comment['routeKey']}") ?>'/>
        <input type='hidden' name='routeKey' value='<?=$comment['routeKey'] ?>'/>
        <p><label>Comment:<br/><textarea name='content'><?=$comment['content']?></textarea></label></p>
        <p><label>Name:<br/><input type='text' name='name' value='<?=$comment['name']?>'/></label></p>
        <p><label>Homepage:<br/><input type='text' name='web' value='<?=$comment['web']?>'/></label></p>
        <p><label>Email:<br/><input type='text' name='mail' value='<?=$comment['mail']?>'/></label></p>
        <p class=buttons>
            <input type='submit' name='doSave' value='Save' onClick ="this.form.action='<?=$this->url->create("comment/save/{$id}")?>'"/>
        </p>
    </form>
</div>