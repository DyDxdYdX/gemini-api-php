<?php

declare(strict_types=1);

namespace GeminiAPI\Tests\Unit\Resources;

use GeminiAPI\Resources\Content;
use GeminiAPI\Resources\Parts\TextPart;
use PHPUnit\Framework\TestCase;

class ContentYamlTest extends TestCase
{
    public function testYaml(): void
    {
        $data = [
            'key' => 'value',
        ];

        $content = Content::yaml($data);
        $this->assertCount(1, $content->parts);
        $this->assertInstanceOf(TextPart::class, $content->parts[0]);
        $this->assertEquals("key: value\n", $content->parts[0]->text);
    }
}
