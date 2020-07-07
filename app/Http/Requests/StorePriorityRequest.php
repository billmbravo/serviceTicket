<?php

namespace App\Http\Requests;

use App\Priority;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StorePriorityRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
        ];
    }
}
