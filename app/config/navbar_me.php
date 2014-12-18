<?php
/**
 * Config-file for navigation bar.
 *
 */
return [

    // Use for styling the menu
    'class' => 'navbar',
 
    // Here comes the menu strcture
    'items' => [

        // This is a menu item
        'home'  => [
            'text'  => 'Home',
            'url'   => '',
            'title' => 'Hemsida'
        ],
        
        'questions' => [
            'text' => 'Frågor',
            'url' => 'questions',
            'title' => 'Frågor'
        ],
        
        'tags' => [
            'text' => 'Taggar',
            'url' => 'tags',
            'title' => 'Taggar'
        ],
        
        'användare' => [
            'text' => 'Användare',
            'url' => 'user',
            'title' => 'Användare'
        ],
        
        'profile' => [
            'text' => 'Profil',
            'url' => 'user/profile',
            'title' => 'Profil'
        ],
        
        'about' => [
            'text' => 'About',
            'url' => 'about',
            'title' => 'About'
        ],
 
        // This is a menu item
        'source' => [
            'text'  =>'Källkod',
            'url'   => 'source',
            'title' => 'Sidans källkod',
        ],
    ],
 
    // Callback tracing the current selected menu item base on scriptname
    'callback' => function ($url) {
        if ($url == $this->di->get('request')->getRoute()) {
                return true;
        }
    },

    // Callback to create the urls
    'create_url' => function ($url) {
        return $this->di->get('url')->create($url);
    },
];
