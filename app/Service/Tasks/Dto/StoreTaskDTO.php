<?php

namespace App\Service\Tasks\Dto;

use App\Http\Requests\StoreTaskRequest;
use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class StoreTaskDTO extends DataTransferObject
{
    public string $name;
    public string $description;
    /**
     * @throws UnknownProperties
     */
    public static function fromRequest(StoreTaskRequest $request): StoreTaskDTO
    {
        return new self(
            name: $request->getName(),
            description:$request->getDescription()
        );

    }
}
