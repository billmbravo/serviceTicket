<?php

namespace App\Http\Requests;

use App\Status;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreStatusRequest extends FormRequest
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
