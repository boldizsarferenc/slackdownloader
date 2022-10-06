<?php

namespace App\ParserBundle\Domain\ValueObject;

use JsonException;

class JsonContent implements ContentInterface
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @throws JsonException
     */
    public function toArray(): array
    {
        return json_decode($this->value, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function merge(ContentInterface $otherContent): ContentInterface
    {
        $values = $this->toArray();
        $otherValues = $otherContent->toArray();

        return new self(json_encode(array_merge($values, $otherValues), JSON_THROW_ON_ERROR));
    }
}
