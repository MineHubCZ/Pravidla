<?php

use Lemon\Kernel\Lifecycle;
use Lemon\Route;

require __DIR__.'/../vendor/autoload.php';

$lifecycle = Lifecycle::init(__DIR__);

$lifecycle->get('templating');

/** @var \Lemon\Templating\Enviroment $env */
$env = $lifecycle->get('templating.env');
$env->macro('markdown', function(string $text) {
    $pd = new \Parsedown();
    $pd->setSafeMode(true);
    $result = $pd->text($text);
    $result = preg_replace(
        '/\(id \d*\)/',
        '<span class="text-muted">$0</span>',
        $result
    );

    return $result;
});

Route::get('/', function(Lifecycle $lifecycle) {
 
    $metadata = file_get_contents($lifecycle->file('data.metadata', 'json'));
    $metadata = json_decode($metadata);
    
    $last_edit = filemtime($lifecycle->file('data.compiled', 'md'));
    $last_edit_formatted = date('d. m. Y H:i:s', $last_edit);
    $last_edit_year = date('Y', $last_edit);

    $content = file_get_contents($lifecycle->file('data.compiled', 'md'));

    return template('home', ...compact('metadata', 'last_edit_year', 'last_edit_formatted', 'content'));
});

Route::template('about', 'about');

Route::get('markdown', 
    fn() => file_get_contents($lifecycle->file('data.compiled', 'md'))
);
