<?php

namespace App\Helpers;

class Login
{
    /**
     * Create a new class instance.
     */
    private static array $userInfo = [
            "user_id" => 2,
            "organisatie_id" => 2
    ];

    public static function init(): void
    {
        self::$userInfo = session()->get("userInfo") ?? self::$userInfo;
    }
    public static function getCart(): array
    {
        return self::$userInfo;
    }
}

Login::init();
