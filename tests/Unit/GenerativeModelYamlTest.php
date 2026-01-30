<?php

declare(strict_types=1);

namespace GeminiAPI\Tests\Unit;

use GeminiAPI\Client;
use GeminiAPI\GenerativeModel;
use GeminiAPI\Resources\Content;
use GeminiAPI\Resources\ModelName;
use GeminiAPI\Resources\Parts\TextPart;
use PHPUnit\Framework\TestCase;
use ReflectionProperty;

class GenerativeModelYamlTest extends TestCase
{
    public function testWithSystemInstructionYaml(): void
    {
        $client = $this->createMock(Client::class);
        $model = new GenerativeModel($client, ModelName::GEMINI_PRO);

        $data = ['role' => 'assistant', 'task' => 'translate'];
        $newModel = $model->withSystemInstructionYaml($data);

        $reflection = new ReflectionProperty(GenerativeModel::class, 'systemInstruction');
        $reflection->setAccessible(true);
        $systemInstruction = $reflection->getValue($newModel);

        $this->assertInstanceOf(Content::class, $systemInstruction);
        $this->assertCount(1, $systemInstruction->parts);

        $part = $systemInstruction->parts[0];
        $this->assertInstanceOf(TextPart::class, $part);
        $this->assertEquals("role: assistant\ntask: translate\n", $part->text);
    }
}
