<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SyncTaskRequest extends FormRequest
{
    public const NAME = 'categories_ids';

    public function rules(): array
    {
        return [
            'categories_ids'=>'required|array|max:255',
        ];
    }

    public function getName():string
    {
        return $this->get(self::NAME);
    }
}
