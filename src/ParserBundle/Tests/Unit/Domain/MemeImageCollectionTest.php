<?php

namespace App\ParserBundle\Tests\Unit\Domain;

use App\ParserBundle\Domain\MemeImage;
use App\ParserBundle\Domain\MemeImageCollection;
use PHPUnit\Framework\TestCase;

class MemeImageCollectionTest extends TestCase
{
    public function testIterate(): void
    {
        $image = new MemeImage('image1.gif');
        $image2 = new MemeImage('image2.jpeg');

        $expected = array(
            $image,
            $image2
        );

        $collection = new MemeImageCollection(
            $image,
            $image2
        );

        $result = array();

        foreach ($collection as $image) {
            $result[] = $image;
        }

        $this->assertSame($expected, $result);
    }
}
