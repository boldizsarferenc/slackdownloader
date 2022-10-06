<?php

namespace App\ParserBundle\Application\GetImages;

use App\ParserBundle\Domain\ValueObject\ContentInterface;

class GetImagesQuery
{
    private ContentInterface $content;
    private int $workerId;

    public function __construct(
        ContentInterface $content,
        int $workerId
    ) {
        $this->content = $content;
        $this->workerId = $workerId;
    }

    public function getWorkerId(): int
    {
        return $this->workerId;
    }

    public function getContent(): ContentInterface
    {
        return $this->content;
    }
}
