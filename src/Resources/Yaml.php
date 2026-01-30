<?php

declare(strict_types=1);

namespace GeminiAPI\Resources;

use Symfony\Component\Yaml\Yaml as SymfonyYaml;

class Yaml
{
    /**
     * @param array<mixed> $data
     * @return string
     */
    public static function fromArray(array $data): string
    {
        return SymfonyYaml::dump(
            $data,
            4,
            2,
            SymfonyYaml::DUMP_MULTI_LINE_LITERAL_BLOCK,
        );
    }
}
