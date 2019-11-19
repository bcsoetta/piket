<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySeksiRequest;
use App\Http\Requests\StoreSeksiRequest;
use App\Http\Requests\UpdateSeksiRequest;
use App\Seksi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SeksiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Seksi::query()->select(sprintf('%s.*', (new Seksi)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'seksi_show';
                $editGate      = 'seksi_edit';
                $deleteGate    = 'seksi_delete';
                $crudRoutePart = 'seksis';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('nama', function ($row) {
                return $row->nama ? $row->nama : "";
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.seksis.index');
    }

    public function create()
    {
        abort_if(Gate::denies('seksi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.seksis.create');
    }

    public function store(StoreSeksiRequest $request)
    {
        $seksi = Seksi::create($request->all());

        return redirect()->route('admin.seksis.index');
    }

    public function edit(Seksi $seksi)
    {
        abort_if(Gate::denies('seksi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.seksis.edit', compact('seksi'));
    }

    public function update(UpdateSeksiRequest $request, Seksi $seksi)
    {
        $seksi->update($request->all());

        return redirect()->route('admin.seksis.index');
    }

    public function show(Seksi $seksi)
    {
        abort_if(Gate::denies('seksi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.seksis.show', compact('seksi'));
    }

    public function destroy(Seksi $seksi)
    {
        abort_if(Gate::denies('seksi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $seksi->delete();

        return back();
    }

    public function massDestroy(MassDestroySeksiRequest $request)
    {
        Seksi::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
