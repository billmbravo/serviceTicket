<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PriorityResource;
use App\Priority;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PrioritiesController extends Controller
{
    public function index()
    {
        return Priority::all();
    }

    public function show(Priority $priority)
    {
        return new PriorityResource($priority);
    }
}
