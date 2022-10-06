<?php

namespace App\ParserBundle\Tests\Unit\Domain;

use App\ParserBundle\Domain\MemeImage;
use App\ParserBundle\Domain\MemeImageCollection;
use PHPUnit\Framework\TestCase;

class MemeImageCollectionTest extends TestCase
{
    protected $expectedUrl = 'https://files.slack.com/files-pri/T3EE9JFUP-F02PY47RXM3/download/fb_img_1638993522505.jpg?t=xoxe-116485627975-2966189903328-2927837011335-8fb3646e67b478d306eb5da3f0365a00';
    protected $testContent = array (
        0 =>
            array (
                'type' => 'message',
                'text' => 'Könyvtárban megvan eza könyv? :sweat_smile:',
                'files' =>
                    array (
                        0 =>
                            array (
                                'id' => 'F02PY47RXM3',
                                'created' => 1638993547,
                                'timestamp' => 1638993547,
                                'name' => 'FB_IMG_1638993522505.jpg',
                                'title' => 'FB_IMG_1638993522505.jpg',
                                'mimetype' => 'image/jpeg',
                                'filetype' => 'jpg',
                                'pretty_type' => 'JPEG',
                                'user' => 'UAVFTQY1L',
                                'editable' => false,
                                'size' => 44248,
                                'mode' => 'hosted',
                                'is_external' => false,
                                'external_type' => '',
                                'is_public' => true,
                                'public_url_shared' => false,
                                'display_as_bot' => false,
                                'username' => '',
                                'url_private' => 'https://files.slack.com/files-pri/T3EE9JFUP-F02PY47RXM3/fb_img_1638993522505.jpg?t=xoxe-116485627975-2966189903328-2927837011335-8fb3646e67b478d306eb5da3f0365a00',
                                'url_private_download' => 'https://files.slack.com/files-pri/T3EE9JFUP-F02PY47RXM3/download/fb_img_1638993522505.jpg?t=xoxe-116485627975-2966189903328-2927837011335-8fb3646e67b478d306eb5da3f0365a00',
                                'media_display_type' => 'unknown',
                                'thumb_64' => 'https://files.slack.com/files-tmb/T3EE9JFUP-F02PY47RXM3-636d4b3b29/fb_img_1638993522505_64.jpg?t=xoxe-116485627975-2966189903328-2927837011335-8fb3646e67b478d306eb5da3f0365a00',
                                'thumb_80' => 'https://files.slack.com/files-tmb/T3EE9JFUP-F02PY47RXM3-636d4b3b29/fb_img_1638993522505_80.jpg?t=xoxe-116485627975-2966189903328-2927837011335-8fb3646e67b478d306eb5da3f0365a00',
                                'thumb_360' => 'https://files.slack.com/files-tmb/T3EE9JFUP-F02PY47RXM3-636d4b3b29/fb_img_1638993522505_360.jpg?t=xoxe-116485627975-2966189903328-2927837011335-8fb3646e67b478d306eb5da3f0365a00',
                                'thumb_360_w' => 308,
                                'thumb_360_h' => 360,
                                'thumb_480' => 'https://files.slack.com/files-tmb/T3EE9JFUP-F02PY47RXM3-636d4b3b29/fb_img_1638993522505_480.jpg?t=xoxe-116485627975-2966189903328-2927837011335-8fb3646e67b478d306eb5da3f0365a00',
                                'thumb_480_w' => 410,
                                'thumb_480_h' => 480,
                                'thumb_160' => 'https://files.slack.com/files-tmb/T3EE9JFUP-F02PY47RXM3-636d4b3b29/fb_img_1638993522505_160.jpg?t=xoxe-116485627975-2966189903328-2927837011335-8fb3646e67b478d306eb5da3f0365a00',
                                'thumb_720' => 'https://files.slack.com/files-tmb/T3EE9JFUP-F02PY47RXM3-636d4b3b29/fb_img_1638993522505_720.jpg?t=xoxe-116485627975-2966189903328-2927837011335-8fb3646e67b478d306eb5da3f0365a00',
                                'thumb_720_w' => 615,
                                'thumb_720_h' => 720,
                                'thumb_800' => 'https://files.slack.com/files-tmb/T3EE9JFUP-F02PY47RXM3-636d4b3b29/fb_img_1638993522505_800.jpg?t=xoxe-116485627975-2966189903328-2927837011335-8fb3646e67b478d306eb5da3f0365a00',
                                'thumb_800_w' => 800,
                                'thumb_800_h' => 937,
                                'thumb_960' => 'https://files.slack.com/files-tmb/T3EE9JFUP-F02PY47RXM3-636d4b3b29/fb_img_1638993522505_960.jpg?t=xoxe-116485627975-2966189903328-2927837011335-8fb3646e67b478d306eb5da3f0365a00',
                                'thumb_960_w' => 820,
                                'thumb_960_h' => 960,
                                'original_w' => 820,
                                'original_h' => 960,
                                'thumb_tiny' => 'AwAwACnPI5pVXccDrQODU1sVEvzDr2oGiMxMBkimdK2AkZH3QG9M1Rmh2HBGD2PrUpjaKwPFLupxUdjk/Sm4qiS0LCbqQAPc0rWgQZeZBjsOTSvuJwCSfemMuTlqbQCLOVbAOQO7cU2aSSY5YEjsAOKkSItnABA6ZNSMku08KPxqdCtSCCTyXy6BgexFWftkf/PFaotISNpxTM1RJYM/OV/WkEgaPkHPqDTHILcdKZx6ChgiaJynUsfbFLPMSvAbjvmoMCgITzxikO4zOaXA9alSEE/M2B9Km8uP0pXCx//Z',
                                'permalink' => 'https://shoprenter.slack.com/files/UAVFTQY1L/F02PY47RXM3/fb_img_1638993522505.jpg',
                                'permalink_public' => 'https://slack-files.com/T3EE9JFUP-F02PY47RXM3-98d4b59605',
                                'is_starred' => false,
                                'has_rich_preview' => false,
                            ),
                    ),
                'upload' => false,
                'user' => 'UAVFTQY1L',
                'display_as_bot' => false,
                'ts' => '1638993585.251300',
                'blocks' =>
                    array (
                        0 =>
                            array (
                                'type' => 'rich_text',
                                'block_id' => 'bIiv',
                                'elements' =>
                                    array (
                                        0 =>
                                            array (
                                                'type' => 'rich_text_section',
                                                'elements' =>
                                                    array (
                                                        0 =>
                                                            array (
                                                                'type' => 'text',
                                                                'text' => 'Könyvtárban megvan eza könyv? ',
                                                            ),
                                                        1 =>
                                                            array (
                                                                'type' => 'emoji',
                                                                'name' => 'sweat_smile',
                                                            ),
                                                    ),
                                            ),
                                    ),
                            ),
                    ),
                'edited' =>
                    array (
                        'user' => 'UAVFTQY1L',
                        'ts' => '1638993606.000000',
                    ),
                'client_msg_id' => '1e6160b5-329e-435d-966e-94bd1c25d34f',
                'reactions' =>
                    array (
                        0 =>
                            array (
                                'name' => 'grin',
                                'users' =>
                                    array (
                                        0 => 'U3D98KGE4',
                                        1 => 'UE1NX9NER',
                                        2 => 'U0186UM3NG7',
                                        3 => 'U02NQ3134PR',
                                        4 => 'UJTJKGCBY',
                                        5 => 'U01M3ULMG03',
                                        6 => 'U015PAW8Z4H',
                                        7 => 'U029NT75DT8',
                                        8 => 'UFB8UMVPG',
                                        9 => 'U01L7N851FG',
                                        10 => 'U0204KD5QKA',
                                        11 => 'U026RQL4KTR',
                                        12 => 'U01BKFDHW4W',
                                        13 => 'UGLH7GRV2',
                                        14 => 'U01G58MEUAY',
                                    ),
                                'count' => 15,
                            ),
                        1 =>
                            array (
                                'name' => 'sleepy',
                                'users' =>
                                    array (
                                        0 => 'U3D98KGE4',
                                        1 => 'U3E2RKD52',
                                        2 => 'U01MH894GHJ',
                                    ),
                                'count' => 3,
                            ),
                        2 =>
                            array (
                                'name' => 'heart_eyes',
                                'users' =>
                                    array (
                                        0 => 'U3DSD8YLU',
                                    ),
                                'count' => 1,
                            ),
                        3 =>
                            array (
                                'name' => 'sleeping',
                                'users' =>
                                    array (
                                        0 => 'U01M3ULMG03',
                                    ),
                                'count' => 1,
                            ),
                    ),
            ),
    );

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

    /**
     * @covers \App\ParserBundle\Domain\MemeImageCollection::createFromArray
     */
    public function testCreateFromArray(){
        $imageUrls = MemeImageCollection::createFromArray($this->testContent);
        /** @var MemeImage $imageUrl */
        foreach ($imageUrls as $imageUrl){
            $this->assertEquals( $this->expectedUrl, $imageUrl->getUrl());
        }
    }
}
