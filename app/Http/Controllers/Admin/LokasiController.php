<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLokasiRequest;
use App\Http\Requests\StoreLokasiRequest;
use App\Http\Requests\UpdateLokasiRequest;
use App\Lokasi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class LokasiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Lokasi::query()->select(sprintf('%s.*', (new Lokasi)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'lokasi_show';
                $editGate      = 'lokasi_edit';
                $deleteGate    = 'lokasi_delete';
                $crudRoutePart = 'lokasis';

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

        return view('admin.lokasis.index');
    }

    public function create()
    {
        abort_if(Gate::denies('lokasi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.lokasis.create');
    }

    public function store(StoreLokasiRequest $request)
    {
        $lokasi = Lokasi::create($request->all());

        return redirect()->route('admin.lokasis.index');
    }

    public function edit(Lokasi $lokasi)
    {
        abort_if(Gate::denies('lokasi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.lokasis.edit', compact('lokasi'));
    }

    public function update(UpdateLokasiRequest $request, Lokasi $lokasi)
    {
        $lokasi->update($request->all());

        return redirect()->route('admin.lokasis.index');
    }

    public function show(Lokasi $lokasi)
    {
        abort_if(Gate::denies('lokasi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.lokasis.show', compact('lokasi'));
    }

    public function destroy(Lokasi $lokasi)
    {
        abort_if(Gate::denies('lokasi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lokasi->delete();

        return back();
    }

    public function massDestroy(MassDestroyLokasiRequest $request)
    {
        Lokasi::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
