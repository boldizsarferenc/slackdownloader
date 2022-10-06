<?php

namespace App\ParserBundle\Domain;

use App\ParserBundle\Domain\ValueObject\ContentCollection;

interface MemeImageParserInterface
{
    /**
     * @param ContentCollection $contents
     * @return MemeImageCollection
     */
    public function getMemeImages(ContentCollection $contents): MemeImageCollection;
}
