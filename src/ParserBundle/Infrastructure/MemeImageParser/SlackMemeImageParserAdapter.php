<?php

namespace App\ParserBundle\Infrastructure\MemeImageParser;

use App\ParserBundle\Domain\Exception\DomainException;
use App\ParserBundle\Domain\MemeImageCollection;
use App\ParserBundle\Domain\MemeImageParserInterface;
use App\ParserBundle\Domain\ValueObject\ContentInterface;
use Exception;

class SlackMemeImageParserAdapter implements MemeImageParserInterface
{
    public function getMemeImages(ContentInterface $content): MemeImageCollection
    {
        try {
            return MemeImageCollection::createFromArray($content->toArray());
        } catch (Exception $exception) {
            throw new DomainException($exception->getMessage(), $exception->getCode());
        }
    }
}
