<?php

namespace App\Http\Requests;

use App\Permission;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdatePermissionRequest extends FormRequest
{

    public function rules()
    {
        return [
            'title' => [
                'required',
            ],
        ];
    }
}
