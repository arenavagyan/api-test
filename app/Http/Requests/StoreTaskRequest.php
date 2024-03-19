<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{


    public const NAME = 'title';
    public const DESCRIPTION = 'description';
    public function rules(): array
    {
        return [
            'title'=>'required|string|max:255'
        ];
    }

    public function getName():string
    {
        return $this->get(self::NAME);
    }
    public function getDescription():string
    {
        return $this->get(self::DESCRIPTION);
    }
}
