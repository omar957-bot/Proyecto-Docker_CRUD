<?php

namespace App\Services;

use App\Http\Requests\RappiRequest;
use App\Repositories\Interfaces\RappiInterfaces;

class RappiServices
{
    protected $repository;

    public function __construct(RappiInterfaces $repository)
    {
        $this->repository = $repository;
    }

    public function getAllRappi()
    {
        return $this->repository->getAllRappi();
    }

    public function getRappiById($id)
    {
        return $this->repository->getRappiById($id);
    }

    public function create(rappiRequest $request)
    {
        return $this->repository->createRappi($request->validated());
    }

    public function update($id, rappiRequest $request)
    {
        return $this->repository->updateRappi($id, $request->validated());
    }

    public function delete($id)
    {
        return $this->repository->deleteRappi($id);
    }
}