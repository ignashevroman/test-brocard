<?php

namespace App\Parser\Contract;

interface Tag extends Comparable
{
    public function tagName(): string;

    public function occurrencesNumber(): int;

    public function incrementOccurrencesNumber(): void;
}