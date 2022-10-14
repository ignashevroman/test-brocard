<?php

namespace App\Parser\HtmlParser;

use App\Parser\Contract\Comparable;
use App\Parser\Contract\Tag;
use InvalidArgumentException;

class HtmlTag implements Tag
{
    private int $occurrences = 1;

    public function __construct(
        private string $name
    )
    {
        if (empty($this->name)) {
            throw new InvalidArgumentException("Tag name cannot be an empty value");
        }
    }

    public function equals(Comparable $other): bool
    {
        return static::class === $other::class && $this->tagName() === $other->tagName();
    }

    public function tagName(): string
    {
        return $this->name;
    }

    public function occurrencesNumber(): int
    {
        return $this->occurrences;
    }

    public function incrementOccurrencesNumber(): void
    {
        $this->occurrences++;
    }

}