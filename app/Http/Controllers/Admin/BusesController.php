<?php

namespace App\Http\Controllers\Admin;

use App\Bus;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBusRequest;
use App\Http\Requests\StoreBusRequest;
use App\Http\Requests\UpdateBusRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BusesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('bus_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $buses = Bus::all();

        return view('admin.buses.index', compact('buses'));
    }

    public function create()
    {
        abort_if(Gate::denies('bus_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.buses.create');
    }

    public function store(StoreBusRequest $request)
    {
        $bus = Bus::create($request->all());

        return redirect()->route('admin.buses.index');
    }

    public function edit(Bus $bus)
    {
        abort_if(Gate::denies('bus_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.buses.edit', compact('bus'));
    }

    public function update(UpdateBusRequest $request, Bus $bus)
    {
        $bus->update($request->all());

        return redirect()->route('admin.buses.index');
    }

    public function show(Bus $bus)
    {
        abort_if(Gate::denies('bus_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.buses.show', compact('bus'));
    }

    public function destroy(Bus $bus)
    {
        abort_if(Gate::denies('bus_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bus->delete();

        return back();
    }

    public function massDestroy(MassDestroyBusRequest $request)
    {
        Bus::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
