<?php

namespace App\Service\Tasks\Dto;

use App\Http\Requests\GetTaskRequest;
use App\Http\Requests\StoreTaskRequest;
use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class GetTaskDTO extends DataTransferObject
{
    public string $name;

    /**
     * @throws UnknownProperties
     */
    public static function fromRequest(GetTaskRequest $request): GetTaskDTO
    {
        return new self(
            name: $request->getName()

        );

    }
}
