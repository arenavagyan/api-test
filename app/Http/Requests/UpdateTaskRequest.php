<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends StoreTaskRequest
{
    public const NAME = 'title';

    public function rules(): array
    {
        return [
            'title'=>'required|string|max:255',
        ];
    }

    public function getName():string
    {
        return $this->get(self::NAME);
    }
}
