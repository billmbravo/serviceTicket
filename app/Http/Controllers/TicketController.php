<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Http\Resources\TicketResource;

class TicketController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'servicio'=> 'required',
            'descripcion'=> 'required',
            'autor'=> 'required',
            'priority_id' => 'required',
        ]);

        $request->request->add([
            'status_id'     => 1
        ]);

        $ticket = Ticket::create($request->all());
        return response(['ticket' => $ticket,'message' => 'Ticket creado con exito'], 200);
    }

    public function show(Ticket $id)
    {
        return $id;
    }
}
