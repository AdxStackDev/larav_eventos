<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreLocationRequest;
use App\Http\Controllers\Controller;
use App\Services\LocationService;

class LocationController extends Controller
{
    protected $locationService;

    public function __construct(LocationService $locationService)
    {
        $this->locationService = $locationService;
    }

    public function index()
    {
        $locations = $this->locationService->getAllLocations();
        return response()->json([
            'success' => true,
            'data' => $locations
        ]);
    }

    public function show($id)
    {
        $location = $this->locationService->getLocationWithRelations($id);
        
        if (!$location) {
            return response()->json([
                'success' => false,
                'message' => 'Location not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $location
        ]);
    }

    public function store(StoreLocationRequest $request)
    {
        $location = $this->locationService->createLocation($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Location created successfully',
            'data' => $location
        ], 201);
    }

    public function update(StoreLocationRequest $request, $id)
    {
        $location = $this->locationService->updateLocation($id, $request->validated());
        
        if (!$location) {
            return response()->json([
                'success' => false,
                'message' => 'Location not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Location updated successfully',
            'data' => $location
        ]);
    }

    public function destroy($id)
    {
        $deleted = $this->locationService->deleteLocation($id);
        
        if (!$deleted) {
            return response()->json([
                'success' => false,
                'message' => 'Location not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Location deleted successfully'
        ]);
    }
}
