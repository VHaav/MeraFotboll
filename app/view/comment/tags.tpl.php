<h2>Alla taggar</h2>
<div class="all_tags">
    <?php
        $tagsHTML = "";
        foreach($tags as $tag){
            $tagsHTML .= <<<EOD
                <a href='{$this->url->create("comment/get-comments-by-tag/{$tag->tag}")}'><div class='single_tag'>{$tag->tag}</div></a>
EOD;
        }
        echo $tagsHTML;
    ?>
</div>