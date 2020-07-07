<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ticket;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Http\Resources\TicketResource;
use Symfony\Component\HttpFoundation\Response;

class TicketController extends Controller
{
    public function index()
    {
        return new TicketResource(Ticket::with(['status', 'priority', 'assigned_to_user'])->get());
    }

    public function store(StoreTicketRequest $request)
    {
        $ticket = Ticket::create($request->all());
        return response(['ticket' => $ticket, 'message' => 'Ticket creado con exito'], 200);
    }
    public function show(Ticket $ticket)
    {
        return new TicketResource($ticket->load(['status', 'priority', 'assigned_to_user'])->get());
    }
    public function update(UpdateTicketRequest $request, Ticket $id)
    {
        $id->update($request->all());
        return response(['ticket'=> $id, 'message' => 'Ticket modificado con exito'], 200);;
    }
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
