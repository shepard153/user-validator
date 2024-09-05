<?php
declare(strict_types=1);

class UserValidator
{
    private const EMAIL_PATTERN = '/^[\w.-]+@([\w-])+\.+[\w-]{2,}/';
    private const PASSWORD_PATTERN = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$/';


    public function validateEmail(string $email): bool
    {
        return (bool) preg_match(self::EMAIL_PATTERN, $email);
    }

    public function validatePassword(string $password): bool
    {
        return (bool) preg_match(self::PASSWORD_PATTERN, $password);
    }
}
