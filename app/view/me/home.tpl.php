<div class="recent_questions">
    <h2>Senaste frågorna:</h2>
    <?php
        foreach($questions as $q){
            echo <<<EOD
                <a href="{$this->di->url->create("comment/select-comment/{$q->id}")}"><p>{$q->title} - {$q->timestamp}</p></a>
EOD;
        }
    ?>
</div>

<div class="popular_tags">
    <h2>Mest använda taggar:</h2>
    <?php
        foreach($tags as $t){
            echo <<<EOD
                <a href='{$this->url->create("comment/get-comments-by-tag/{$t->tag}")}'><div class='single_tag'>{$t->tag}</div></a>
EOD;
        }
    ?>
</div>

<div class="active_users">
    <h2>Mest aktiva användare:</h2>
    <?php  
        foreach($users as $u){
            $grav_url = 'http://www.gravatar.com/avatar/' . md5(strtolower(trim($u->email))) . '.jpg?s=25';
            echo <<<EOD
                <a class="no-decor" href='{$this->url->create("users/id/" . $u->id)}'>
                    <div class="user_stamp">
                        <img src="{$grav_url}"/>
                        {$u->acronym}
                    </div>
                </a>
EOD;
        }
    ?>
</div>