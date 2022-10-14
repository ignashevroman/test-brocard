<?php

namespace App\Parser\Contract;

use App\Parser\ValueObject\URL;

interface TagsParser
{
    public function parse(URL $url): TagsCollection;
}