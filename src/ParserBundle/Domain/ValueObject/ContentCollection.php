<?php

namespace App\ParserBundle\Domain\ValueObject;

use IteratorAggregate;
use Traversable;

class ContentCollection implements IteratorAggregate
{
    /**
     * @var Content[]
     */
    private array $contents;

    public function __construct(Content ...$contents)
    {
        $this->contents = $contents;
    }

    public function getIterator(): Traversable
    {
        return new \ArrayIterator($this->contents);
    }
}
