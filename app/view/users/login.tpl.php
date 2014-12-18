<?php
    if($this->di->flasher->checkMessageSet()){
        echo $this->di->flasher->getMessageHTML();
    }
    if($this->di->session->get('user') !== null){
        echo <<<EOD
            <div class="flash_info">Du är nu inloggad som {$this->di->session->get('user')->acronym}, <a style="color: white;" href="{$this->url->create("users/logout")}">logga ut?</a></div>
EOD;
    }
    echo $content;
    
    echo <<<EOD
        <a href="{$this->url->create("form/add-user")}"><i class="fa fa-plus-square"> Registrera nytt konto</i></a>
EOD;
?>
 
<?php if(isset($byline)) : ?>
<footer class="byline">
<?=$byline?>
</footer>
<?php endif; ?>