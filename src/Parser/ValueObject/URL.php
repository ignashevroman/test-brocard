<?php

namespace App\Parser\ValueObject;

use InvalidArgumentException;

final class URL
{
    private string $url;

    public function __construct(string $url)
    {
        $url = filter_var($url, FILTER_SANITIZE_URL);
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            throw new InvalidArgumentException('Url is invalid');
        }

        $this->url = $url;
    }

    public function __toString(): string
    {
        return $this->url;
    }
}