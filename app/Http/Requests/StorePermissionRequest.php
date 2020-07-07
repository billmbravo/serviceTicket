<?php

namespace App\Http\Requests;

use App\Permission;
use Illuminate\Foundation\Http\FormRequest;

class StorePermissionRequest extends FormRequest
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
