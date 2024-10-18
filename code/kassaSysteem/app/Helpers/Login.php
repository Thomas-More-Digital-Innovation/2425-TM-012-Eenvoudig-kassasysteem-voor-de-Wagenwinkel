<?php

namespace App\Helpers;

class Login
{
    /**
     * Create a new class instance.
     */
    private static array $userInfo = [
            "user_id" => null,
            "organisatie_id" => null,
    ];

    public static function init(): void
    {
        self::$userInfo = session()->get("userInfo") ?? self::$userInfo;
    }
    public static function getUser(): array
    {
        return self::$userInfo;
    }

}

Login::init();
