<?php

namespace App\ParserBundle\Domain;

use App\ParserBundle\Domain\Exception\DomainException;
use App\ParserBundle\Domain\ValueObject\ContentInterface;

interface MemeImageParserInterface
{
    /**
     * @throws DomainException
     */
    public function getMemeImages(ContentInterface $content): MemeImageCollection;
}
