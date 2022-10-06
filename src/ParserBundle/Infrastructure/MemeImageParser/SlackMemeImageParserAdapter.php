<?php

namespace App\ParserBundle\Infrastructure\MemeImageParser;

use App\ParserBundle\Domain\ContentDecoderInterface;
use App\ParserBundle\Domain\Exception\DomainException;
use App\ParserBundle\Domain\MemeImageCollection;
use App\ParserBundle\Domain\MemeImageParserInterface;
use App\ParserBundle\Domain\ValueObject\ContentCollection;
use Exception;

class SlackMemeImageParserAdapter implements MemeImageParserInterface
{
    private ContentDecoderInterface $contentDecoder;

    public function __construct(ContentDecoderInterface $contentDecoder)
    {
        $this->contentDecoder = $contentDecoder;
    }

    /**
     * @param ContentCollection $contents
     * @return MemeImageCollection
     * @throws DomainException
     */
    public function getMemeImages(ContentCollection $contents): MemeImageCollection
    {
        try {
            $memeImageCollection = new MemeImageCollection();
            foreach ($contents as $content) {
                $decodedContent = $this->contentDecoder->decode($content);
                $memeImageCollection->merge(MemeImageCollection::createFromArray($decodedContent));
            }
            return $memeImageCollection;
        } catch (Exception $exception) {
            throw new DomainException($exception->getMessage(), $exception->getCode());
        }
    }
}
