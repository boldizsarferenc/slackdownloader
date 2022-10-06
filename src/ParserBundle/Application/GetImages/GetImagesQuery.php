<?php

namespace App\ParserBundle\Application\GetImages;

use App\ParserBundle\Domain\ValueObject\ContentCollection;

class GetImagesQuery
{
    private ContentCollection $contents;
    private int $workerId;

    public function __construct(
        ContentCollection $contents,
        int $workerId
    ) {
        $this->contents = $contents;
        $this->workerId = $workerId;
    }

    public function getWorkerId(): int
    {
        return $this->workerId;
    }

    /**
     * @return ContentCollection
     */
    public function getContents(): ContentCollection
    {
        return $this->contents;
    }
}
