<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Distro service provider
    |--------------------------------------------------------------------------
    | Currently available:
    |     bitaac\Othire\OthireServiceProvider::class
    |     bitaac\Tfs10\Tfs10ServiceProvider::class
    |
    */

    'distro' => env('DISTRO', bitaac\Othire\OthireServiceProvider::class),

    /*
    |--------------------------------------------------------------------------
    | Theme service provider
    |--------------------------------------------------------------------------
    | Currently available:
    |     bitaac\Theme\RetroThemeServiceProvider::class
    |
    */

    'theme' => bitaac\Theme\RetroThemeServiceProvider::class,

    /*
    |--------------------------------------------------------------------------
    | Special
    |--------------------------------------------------------------------------
    | Special is a group of URL:s that can help you with many things, example
    | /special/convert/players will convert all players to make them
    | work with bitaac.
    |
    | Note: This should ALWAYS be false if you not using it.
    |
    */

    'special' => false,

];
