<?php

namespace App\Http\Controllers\Admin;

use App\Bidang;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBidangRequest;
use App\Http\Requests\StoreBidangRequest;
use App\Http\Requests\UpdateBidangRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BidangController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Bidang::query()->select(sprintf('%s.*', (new Bidang)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'bidang_show';
                $editGate      = 'bidang_edit';
                $deleteGate    = 'bidang_delete';
                $crudRoutePart = 'bidangs';

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

        return view('admin.bidangs.index');
    }

    public function create()
    {
        abort_if(Gate::denies('bidang_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bidangs.create');
    }

    public function store(StoreBidangRequest $request)
    {
        $bidang = Bidang::create($request->all());

        return redirect()->route('admin.bidangs.index');
    }

    public function edit(Bidang $bidang)
    {
        abort_if(Gate::denies('bidang_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bidangs.edit', compact('bidang'));
    }

    public function update(UpdateBidangRequest $request, Bidang $bidang)
    {
        $bidang->update($request->all());

        return redirect()->route('admin.bidangs.index');
    }

    public function show(Bidang $bidang)
    {
        abort_if(Gate::denies('bidang_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bidangs.show', compact('bidang'));
    }

    public function destroy(Bidang $bidang)
    {
        abort_if(Gate::denies('bidang_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bidang->delete();

        return back();
    }

    public function massDestroy(MassDestroyBidangRequest $request)
    {
        Bidang::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
