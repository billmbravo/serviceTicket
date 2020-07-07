<?php

namespace App\Http\Requests;

use App\Ticket;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateTicketRequest extends FormRequest
{
    public function rules()
    {
        return [
            'servicio'=> [
                'required',
            ],
            'status_id'=> [
                'required',
                'integer',
            ],
            'priority_id'=> [
                'required',
                'integer',
            ],
        ];
    }
}
