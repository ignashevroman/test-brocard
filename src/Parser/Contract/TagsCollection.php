<?php

namespace App\Parser\Contract;

use IteratorAggregate;

interface TagsCollection extends IteratorAggregate
{
    public function append(Tag $tag): void;
}