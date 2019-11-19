<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPetugaRequest;
use App\Http\Requests\StorePetugaRequest;
use App\Http\Requests\UpdatePetugaRequest;
use App\Petuga;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PetugasController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('petuga_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $petugas = Petuga::all();

        return view('admin.petugas.index', compact('petugas'));
    }

    public function create()
    {
        abort_if(Gate::denies('petuga_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.petugas.create');
    }

    public function store(StorePetugaRequest $request)
    {
        $petuga = Petuga::create($request->all());

        return redirect()->route('admin.petugas.index');
    }

    public function edit(Petuga $petuga)
    {
        abort_if(Gate::denies('petuga_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.petugas.edit', compact('petuga'));
    }

    public function update(UpdatePetugaRequest $request, Petuga $petuga)
    {
        $petuga->update($request->all());

        return redirect()->route('admin.petugas.index');
    }

    public function show(Petuga $petuga)
    {
        abort_if(Gate::denies('petuga_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.petugas.show', compact('petuga'));
    }

    public function destroy(Petuga $petuga)
    {
        abort_if(Gate::denies('petuga_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $petuga->delete();

        return back();
    }

    public function massDestroy(MassDestroyPetugaRequest $request)
    {
        Petuga::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
