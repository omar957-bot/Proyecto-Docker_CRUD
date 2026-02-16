<?php
namespace App\Repositories\Eloquent;
use App\Models\Rappi;
use App\Repositories\Interfaces\RappiInterfaces;

class RappiRepository implements RappiInterfaces
{
    public function getAllRappi()
    {
        return Rappi::all();
    }

    public function getRappiById($id)
    {
        $rappi = Rappi::find($id);

        return !$rappi ? null : $rappi;
    }

    public function createRappi(array $data)
    {
        return Rappi::create($data);
    }

    public function updateRappi($id, array $data)
    {
        $rappi = Rappi::find($id);

        if (!$rappi) {
            return null;
        }

        $rappi->update($data);
        return $rappi;
    }

    public function deleteRappi($id)
    {
        $rappi = Rappi::find($id);

        if (!$rappi) {
            return null;
        }

        $rappi->delete();
        return true;
    }
}