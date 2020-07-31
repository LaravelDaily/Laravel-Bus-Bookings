<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Bus;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBusRequest;
use App\Http\Requests\UpdateBusRequest;
use App\Http\Resources\Admin\BusResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BusesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('bus_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BusResource(Bus::all());
    }

    public function store(StoreBusRequest $request)
    {
        $bus = Bus::create($request->all());

        return (new BusResource($bus))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Bus $bus)
    {
        abort_if(Gate::denies('bus_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BusResource($bus);
    }

    public function update(UpdateBusRequest $request, Bus $bus)
    {
        $bus->update($request->all());

        return (new BusResource($bus))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Bus $bus)
    {
        abort_if(Gate::denies('bus_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bus->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
