<?php

namespace App\ParserBundle\Domain;

use App\ParserBundle\Domain\ValueObject\Content;

interface ContentDecoderInterface
{
    public function decode(Content $content): array;

    public function canDecode(Content $content): bool;
}
