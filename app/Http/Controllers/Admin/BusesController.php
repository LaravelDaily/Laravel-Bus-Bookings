<?php

namespace App\Http\Controllers\Admin;

use App\Bu;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBuRequest;
use App\Http\Requests\StoreBuRequest;
use App\Http\Requests\UpdateBuRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BusesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('bu_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bus = Bu::all();

        return view('admin.bus.index', compact('bus'));
    }

    public function create()
    {
        abort_if(Gate::denies('bu_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bus.create');
    }

    public function store(StoreBuRequest $request)
    {
        $bu = Bu::create($request->all());

        return redirect()->route('admin.bus.index');
    }

    public function edit(Bu $bu)
    {
        abort_if(Gate::denies('bu_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bus.edit', compact('bu'));
    }

    public function update(UpdateBuRequest $request, Bu $bu)
    {
        $bu->update($request->all());

        return redirect()->route('admin.bus.index');
    }

    public function show(Bu $bu)
    {
        abort_if(Gate::denies('bu_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bus.show', compact('bu'));
    }

    public function destroy(Bu $bu)
    {
        abort_if(Gate::denies('bu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bu->delete();

        return back();
    }

    public function massDestroy(MassDestroyBuRequest $request)
    {
        Bu::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
