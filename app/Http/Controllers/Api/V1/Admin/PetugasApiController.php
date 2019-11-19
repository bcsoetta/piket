<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePetugaRequest;
use App\Http\Requests\UpdatePetugaRequest;
use App\Http\Resources\Admin\PetugaResource;
use App\Petuga;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PetugasApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('petuga_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PetugaResource(Petuga::all());
    }

    public function store(StorePetugaRequest $request)
    {
        $petuga = Petuga::create($request->all());

        return (new PetugaResource($petuga))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Petuga $petuga)
    {
        abort_if(Gate::denies('petuga_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PetugaResource($petuga);
    }

    public function update(UpdatePetugaRequest $request, Petuga $petuga)
    {
        $petuga->update($request->all());

        return (new PetugaResource($petuga))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Petuga $petuga)
    {
        abort_if(Gate::denies('petuga_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $petuga->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
