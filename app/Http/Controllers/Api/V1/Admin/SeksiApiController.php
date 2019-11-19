<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSeksiRequest;
use App\Http\Requests\UpdateSeksiRequest;
use App\Http\Resources\Admin\SeksiResource;
use App\Seksi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SeksiApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('seksi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SeksiResource(Seksi::all());
    }

    public function store(StoreSeksiRequest $request)
    {
        $seksi = Seksi::create($request->all());

        return (new SeksiResource($seksi))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Seksi $seksi)
    {
        abort_if(Gate::denies('seksi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SeksiResource($seksi);
    }

    public function update(UpdateSeksiRequest $request, Seksi $seksi)
    {
        $seksi->update($request->all());

        return (new SeksiResource($seksi))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Seksi $seksi)
    {
        abort_if(Gate::denies('seksi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $seksi->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
