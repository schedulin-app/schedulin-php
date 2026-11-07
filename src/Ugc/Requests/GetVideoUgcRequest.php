<?php

namespace Schedulin\Ugc\Requests;

use Schedulin\Core\Json\JsonSerializableType;

class GetVideoUgcRequest extends JsonSerializableType
{
    /**
     * @var string $id
     */
    public string $id;

    /**
     * @var ?int $waitSeconds
     */
    public ?int $waitSeconds;

    /**
     * @param array{
     *   id: string,
     *   waitSeconds?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->waitSeconds = $values['waitSeconds'] ?? null;
    }
}
