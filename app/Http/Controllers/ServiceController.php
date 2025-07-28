<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::where('status','active')->get();

        return ServiceResource::collection($services);
    }

    public function store(ServiceRequest $request)
    {
        $service = Service::create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Service Created Successfully',
            'data'  => new ServiceResource($service)
        ]);
    }

    public function update(ServiceRequest $request, Service $service)
    {
        $service->update($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Service updated successfully',
            'service' => new ServiceResource($service)
        ]);
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data has been deleted successfully',
        ],200);
    }
}
