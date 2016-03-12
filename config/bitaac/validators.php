<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Account Log In
    |--------------------------------------------------------------------------
    | ..
    |
    */

    'account-login' => [
        'account'    => ['required'],
        'password'   => ['required'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Account Creation
    |--------------------------------------------------------------------------
    |
    | ...
    |
    */

    'account-register' => [
        'account'    => ['required', 'digits_between:6,8', 'regex:/^([0-9]+)$/', 'unique:accounts,id'],
        'email'      => ['required', 'email', 'unique:accounts,email'],
        'password'   => ['required', 'confirmed', 'min:6'],
        'terms'      => ['accepted'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Account Change Password
    |--------------------------------------------------------------------------
    |
    | ...
    |
    */

    'account-change-password' => [
        'current'    => ['required'],
        'password'   => ['required', 'confirmed', 'min:6'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Account Change Email
    |--------------------------------------------------------------------------
    |
    | ...
    |
    */

    'account-change-email' => [
        'password'   => ['required'],
        'email'      => ['required', 'email', 'unique:accounts,email'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Player Creation
    |--------------------------------------------------------------------------
    |
    | ...
    |
    */

    'player-creation' => [
        'name'       => ['required', 'between:3,20', 'charname', 'blacklisted:bitaac.character.create-blocked-keywords', 'unique:players,name'],
        'gender'     => ['required', 'in_config_key:bitaac.character.create-genders'],
        'vocation'   => ['required', 'in_config_key:bitaac.character.create-vocations'],
        'town'       => ['required', 'in_config_key:bitaac.character.create-towns'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Player Delete
    |--------------------------------------------------------------------------
    |
    | ...
    |
    */

    'player-delete' => [
        'character'  => ['required'],
        'password'   => ['required']
    ]

];
