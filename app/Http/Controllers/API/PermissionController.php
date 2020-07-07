<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Permission;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\PermissionResource;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return $permissions;
    }

    public function store(StorePermissionRequest $request)
    {
        $permission = Permission::create($request->all());

        return (new PermissionResource($permission))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Permission $permission)
    {
        return new PermissionResource($permission);
    }

    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        $permission->update($request->all());
        return (new PermissionResource($permission))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);

    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }

}
