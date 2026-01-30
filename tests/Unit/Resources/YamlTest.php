<?php

declare(strict_types=1);

namespace GeminiAPI\Tests\Unit\Resources;

use GeminiAPI\Resources\Yaml;
use PHPUnit\Framework\TestCase;

class YamlTest extends TestCase
{
    public function testFromArray(): void
    {
        $data = [
            'name' => 'xyz',
            'role' => 'engineer',
            'skills' => ['AI', 'MLOps', 'Python'],
        ];

        $expected = "name: xyz\nrole: engineer\nskills:\n  - AI\n  - MLOps\n  - Python\n";
        $this->assertEquals($expected, Yaml::fromArray($data));
    }
}
