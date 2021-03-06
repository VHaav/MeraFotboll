<?php
require __DIR__.'/config_with_app.php';

$app->url->setUrlType(\Anax\Url\CUrl::URL_CLEAN);

$app->theme->configure(ANAX_APP_PATH . 'config/theme_me.php');
$app->navbar->configure(ANAX_APP_PATH . 'config/navbar_me.php');

$app->router->add('', function() use ($app){
        $app->theme->setTitle("Startsida");
        $byline  = $app->fileContent->get('byline.md');
        $app->dispatcher->forward([
            'controller' => 'comment',
            'action' => 'home',
        ]);
});

$app->router->add('questions', function() use($app){
        $app->theme->setTitle("Frågor");
        
        $app->dispatcher->forward([
            'controller' => 'comment',
            'action' => 'view',
            'params'     => ['questions'], // används för att skapa egna kommentarsflöden för varje sida, matchar routen
        ]);
        
        $app->dispatcher->forward([
            'controller' => 'form',
            'action' => 'comment-form',
        ]);               
});

$app->router->add('tags', function() use($app){
        $app->theme->setTitle("Taggar");
        $app->dispatcher->forward([
            'controller' => 'comment',
            'action' => 'get-all-tags',
        ]);
});

$app->router->add('user', function() use($app){
        $app->theme->setTitle("Användare");
        $app->dispatcher->forward([
            'controller' => 'users',
            'action' => 'list'
        ]);               
});

$app->router->add('user/reset', function() use($app){
        $app->dispatcher->forward([
            'controller' => 'users',
            'action' => 'reset'
        ]);
});

$app->router->add('user/profile', function() use($app){
        $app->dispatcher->forward([
            'controller' => 'users',
            'action' => 'profile'
        ]);
});

$app->router->add('about', function() use($app){
        $app->theme->setTitle("Om oss");
        $content = $app->fileContent->get('about.md');
        $content = $app->textFilter->doFilter($content, 'shortcode, markdown');
        $app->views->add('me/page', [
            'content' => $content,
        ]);
                       
});

$app->router->add('comment/reset', function() use($app){
        $app->dispatcher->forward([
            'controller' => 'comment',
            'action' => 'reset'
        ]);
});

$app->router->add('source', function() use ($app){
        
        $app->theme->addStylesheet('css/source.css');
        $app->theme->setTitle("Källkod");
        
        $source = new \Mos\Source\CSource([
            'secure_dir' => '..',
            'base_dir' => '..',
            'add_ignore' => ['.htaccess'],
        ]);
        
        $app->views->add('me/source', [
            'content' => $source->View(),
        ]);
});

$app->router->add('setup/db', function() use ($app){
        $app->db->dropTableIfExists('answear')->execute();
        $app->db->createTable(
            'answear',
            [
                'id' => ['integer', 'primary key', 'not null', 'auto_increment'],
                'questionID' => ['integer', 'not null', 'references kmom07_comment(id)'],
                'text' => ['text'],
                'user' => ['integer', 'not null', 'references kmom07_user(id)'],
                'created' => ['datetime'],
                'edited' => ['datetime'],
                'deleted' => ['datetime'],
            ]
        )->execute();
        
        $app->db->dropTableIfExists('commentcomment')->execute();
        $app->db->createTable(
            'commentcomment',
            [
                'id' => ['integer', 'primary key', 'not null', 'auto_increment'],
                'questionID' => ['integer', 'references kmom07_comment(id)'],
                'answearID' => ['integer', 'references kmom07_answear(id)'],
                'text' => ['text'],
                'user' => ['integer', 'not null', 'references kmom07_user(id)'],
                'created' => ['datetime'],
                'edited' => ['datetime'],
                'deleted' => ['datetime'],
            ]
        )->execute();
        
        $app->db->dropTableIfExists('tag')->execute();
        $app->db->createTable(
            'tag',
            [
                'id' => ['integer', 'primary key', 'not null', 'auto_increment'],
                'tag' => ['text', 'not null'],
                'questionID' => ['integer', 'not null', 'references kmom07_comment(id)'],
            ]
        )->execute();
        
        $app->dispatcher->forward([
            'controller' => 'comment',
            'action' => 'reset'
        ]);
});

$app->router->handle();
$app->theme->render();