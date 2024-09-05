<?php

declare(strict_types=1);

require_once 'UserValidator.php';

$email = "test@example.com";
$password = "StrongPass1!";

if (isset($argv[1]) && $argv[1] === 'test') {
    runTestCredentials();
} else {
    login($email, $password);
}

function login(string $email, string $password): void
{
    $validator = new UserValidator();

    if ($validator->validateEmail($email)) {
        echo "Email is valid.\n";
    } else {
        echo "Email is invalid.\n";
    }
    if ($validator->validatePassword($password)) {
        echo "Password is valid.\n";
    } else {
        echo "Password is invalid.\n";
    }
}

function runTestCredentials(): void
{
    $testCredentials = [
        ['email' => 'john.doe@example.com',     'password' => 'Password@123'],
        ['email' => 'anna_smith@domain.net',    'password' => 'Secure1$Pass'],
        ['email' => 'user123@sub.domain.com',   'password' => 'Pa$$w0rd123'],
        ['email' => 'invalid-email.com',        'password' => 'Password@123'],
        ['email' => 'jane@domain',              'password' => 'passWord1@'],
        ['email' => 'valid@domain.com',         'password' => 'short1!'],
        ['email' => 'no_special@domain.com',    'password' => 'Password123'],
        ['email' => 'missing_upper@domain.com', 'password' => 'password1@'],
        ['email' => 'missing_digit@domain.com', 'password' => 'Password!'],
        ['email' => 'missing_lower@domain.com', 'password' => 'PASSWORD1@'],
    ];

    foreach ($testCredentials as $credentials) {
        login($credentials['email'], $credentials['password']);
    }
}
