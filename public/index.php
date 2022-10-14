<?php

use App\Parser\Contract\Tag;
use App\Parser\HtmlParser\HtmlTagsParser;
use App\Parser\ValueObject\URL;

require __DIR__ . '/../vendor/autoload.php';

try {
    $url = new URL($_GET['url']);
    $parser = new HtmlTagsParser();

    $collection = $parser->parse($url);

    echo '<b>URL: ' . $url. '<br> List of tags:</b><br>';
    foreach ($collection as $item) {
        /** @var Tag $item */
        echo sprintf("%s - %d", $item->tagName(), $item->occurrencesNumber()) . '<br>';
    }
} catch (Throwable $exception) {
    echo 'Error has occurred: ' . $exception->getMessage();
    print_r($exception);
}