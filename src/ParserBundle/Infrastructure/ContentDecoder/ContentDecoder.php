<?php

namespace App\ParserBundle\Infrastructure\ContentDecoder;

use App\ParserBundle\Domain\ContentDecoderInterface;
use App\ParserBundle\Domain\ValueObject\Content;
use RuntimeException;

class ContentDecoder implements ContentDecoderInterface
{
    /**
     * @var ContentDecoderInterface[]
     */
    private array $contentDecoders;

    public function addDecoder(ContentDecoderInterface $contentDecoder): void
    {
        $this->contentDecoders[] = $contentDecoder;
    }

    public function decode(Content $content): array
    {
        foreach ($this->contentDecoders as $contentDecoder) {
            if ($contentDecoder->canDecode($content)) {
                return $contentDecoder->decode($content);
            }
        }

        throw new RuntimeException('Missing decoder for content.');
    }

    public function canDecode(Content $content): bool
    {
        foreach ($this->contentDecoders as $contentDecoder) {
            if ($contentDecoder->canDecode($content)) {
                return true;
            }
        }
        return false;
    }
}
