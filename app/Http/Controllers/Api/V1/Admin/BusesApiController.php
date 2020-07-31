<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Bu;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBuRequest;
use App\Http\Requests\UpdateBuRequest;
use App\Http\Resources\Admin\BuResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BusesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('bu_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BuResource(Bu::all());
    }

    public function store(StoreBuRequest $request)
    {
        $bu = Bu::create($request->all());

        return (new BuResource($bu))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Bu $bu)
    {
        abort_if(Gate::denies('bu_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BuResource($bu);
    }

    public function update(UpdateBuRequest $request, Bu $bu)
    {
        $bu->update($request->all());

        return (new BuResource($bu))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Bu $bu)
    {
        abort_if(Gate::denies('bu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bu->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
