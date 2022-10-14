<?php

namespace App\Parser\HtmlParser;

use App\Parser\Contract\TagsCollection;
use App\Parser\Contract\TagsParser;
use App\Parser\ValueObject\URL;

class HtmlTagsParser implements TagsParser
{
    private const HTML_TAG_REGEX = '/<([^\/>.!\s]+)[\w\n\s\t=\-"\/]*>/';

    public function parse(URL $url): TagsCollection
    {
        $collection = new HtmlTagsCollection();
        $html = file_get_contents((string) $url);
        preg_match_all(self::HTML_TAG_REGEX, $html, $matches);

        foreach ($matches[1] as $name) {
            $collection->append(new HtmlTag(strtolower($name)));
        }

        return $collection;
    }
}