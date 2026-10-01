<?php

namespace Schedulin\Ai\Requests;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Ai\Types\GenerateImageAiRequestModelKey;

class GenerateImageAiRequest extends JsonSerializableType
{
    /**
     * @var string $prompt
     */
    #[JsonProperty('prompt')]
    public string $prompt;

    /**
     * @var ?value-of<GenerateImageAiRequestModelKey> $modelKey
     */
    #[JsonProperty('modelKey')]
    public ?string $modelKey;

    /**
     * @var ?int $width
     */
    #[JsonProperty('width')]
    public ?int $width;

    /**
     * @var ?int $height
     */
    #[JsonProperty('height')]
    public ?int $height;

    /**
     * @param array{
     *   prompt: string,
     *   modelKey?: ?value-of<GenerateImageAiRequestModelKey>,
     *   width?: ?int,
     *   height?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->prompt = $values['prompt'];
        $this->modelKey = $values['modelKey'] ?? null;
        $this->width = $values['width'] ?? null;
        $this->height = $values['height'] ?? null;
    }
}
