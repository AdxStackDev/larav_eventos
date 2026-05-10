<?php

namespace App\Repositories;

use App\Repositories\Interfaces\LocationRepositoryInterface;
use App\Models\Location;

class LocationRepository implements LocationRepositoryInterface
{
    public function all()
    {
        return Location::all();
    }

    public function find($id)
    {
        return Location::find($id);
    }

    public function create(array $data)
    {
        return Location::create($data);
    }

    public function update(array $data, $id)
    {
        $location = Location::find($id);
        if ($location) {
            $location->update($data);
            return $location;
        }
        return null;
    }

    public function delete($id)
    {
        $location = Location::find($id);
        if ($location) {
            $location->delete();
            return true;
        }
        return false;
    }
}
