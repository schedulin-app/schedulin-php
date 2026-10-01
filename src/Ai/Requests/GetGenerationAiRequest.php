<?php

namespace Schedulin\Ai\Requests;

use Schedulin\Core\Json\JsonSerializableType;

class GetGenerationAiRequest extends JsonSerializableType
{
    /**
     * @var string $id
     */
    public string $id;

    /**
     * @param array{
     *   id: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
    }
}
