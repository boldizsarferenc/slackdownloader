<?php

namespace App\ParserBundle\Infrastructure\ContentDecoder;

use App\ParserBundle\Domain\ContentDecoderInterface;
use App\ParserBundle\Domain\ValueObject\Content;

class JsonContentDecoder implements ContentDecoderInterface
{
    public function decode(Content $content): array
    {
        return json_decode($content->getValue(), true, 512, JSON_THROW_ON_ERROR);
    }

    public function canDecode(Content $content): bool
    {
        json_decode($content->getValue(), false, 512, JSON_THROW_ON_ERROR);
        return json_last_error() === JSON_ERROR_NONE;
    }
}
