<?php

namespace Core;

class JWT
{
    public static function generate(): string
    {
        return hash('sha512', time() . random_bytes(64));
    }

    public static function verify(string $token, string $dbToken): bool
    {
        return hash_equals($token, $dbToken);
    }
}
