<?php

namespace App\Services;

use App\Repositories\Interfaces\LocationRepositoryInterface;
use App\Models\Location;

class LocationService
{
    protected $locationRepository;

    public function __construct(LocationRepositoryInterface $locationRepository)
    {
        $this->locationRepository = $locationRepository;
    }

    public function getAllLocations()
    {
        return Location::with(['events', 'tickets'])->get();
    }

    public function getLocationWithRelations($id)
    {
        return Location::with(['events', 'tickets'])->find($id);
    }

    public function createLocation(array $data)
    {
        return $this->locationRepository->create($data);
    }

    public function updateLocation($id, array $data)
    {
        return $this->locationRepository->update($data, $id);
    }

    public function deleteLocation($id)
    {
        return $this->locationRepository->delete($id);
    }
}
