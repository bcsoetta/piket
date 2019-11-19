<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Bidang;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBidangRequest;
use App\Http\Requests\UpdateBidangRequest;
use App\Http\Resources\Admin\BidangResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BidangApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('bidang_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BidangResource(Bidang::all());
    }

    public function store(StoreBidangRequest $request)
    {
        $bidang = Bidang::create($request->all());

        return (new BidangResource($bidang))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Bidang $bidang)
    {
        abort_if(Gate::denies('bidang_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BidangResource($bidang);
    }

    public function update(UpdateBidangRequest $request, Bidang $bidang)
    {
        $bidang->update($request->all());

        return (new BidangResource($bidang))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Bidang $bidang)
    {
        abort_if(Gate::denies('bidang_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bidang->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
