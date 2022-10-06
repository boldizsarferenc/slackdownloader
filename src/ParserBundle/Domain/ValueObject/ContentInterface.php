<?php

namespace App\ParserBundle\Domain\ValueObject;

interface ContentInterface
{
    public function toArray(): array;

    public function merge(ContentInterface $otherContent): ContentInterface;
}
