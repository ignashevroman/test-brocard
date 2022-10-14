<?php

namespace App\Parser\HtmlParser;

use App\Parser\Contract\Tag;
use App\Parser\Contract\TagsCollection;
use ArrayIterator;
use Traversable;

class HtmlTagsCollection implements TagsCollection
{
    /**
     * @var Tag[]
     */
    private array $tags = [];

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->tags);
    }

    public function append(Tag $tag): void
    {
        $found = false;
        foreach ($this->tags as $existingTag) {
            if (!$existingTag->equals($tag)) {
                continue;
            }

            $found = true;
            $existingTag->incrementOccurrencesNumber();
        }

        if (!$found) {
            $this->tags[] = $tag;
        }
    }

}