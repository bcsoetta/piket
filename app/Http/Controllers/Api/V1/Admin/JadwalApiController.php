<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJadwalRequest;
use App\Http\Requests\UpdateJadwalRequest;
use App\Http\Resources\Admin\JadwalResource;
use App\Jadwal;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JadwalApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('jadwal_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JadwalResource(Jadwal::with(['petugas', 'bidang', 'seksi', 'lokasi'])->get());
    }

    public function store(StoreJadwalRequest $request)
    {
        $jadwal = Jadwal::create($request->all());

        return (new JadwalResource($jadwal))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Jadwal $jadwal)
    {
        abort_if(Gate::denies('jadwal_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JadwalResource($jadwal->load(['petugas', 'bidang', 'seksi', 'lokasi']));
    }

    public function update(UpdateJadwalRequest $request, Jadwal $jadwal)
    {
        $jadwal->update($request->all());

        return (new JadwalResource($jadwal))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Jadwal $jadwal)
    {
        abort_if(Gate::denies('jadwal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jadwal->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
