<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use App\Services\ServiceManager;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    private $serviceManager;

    public function __construct(ServiceManager $service)
    {
        $this->serviceManager = $service;
    }

    public function index()
    {
        $services = $this->serviceManager->getAllServices();

        return ServiceResource::collection($services);
    }

    public function store(ServiceRequest $request)
    {
        $data = $request->validated();

        $service = $this->serviceManager->store($data);

        return response()->json([
            'success' => true,
            'message' => 'Service Created Successfully',
            'data'  => new ServiceResource($service)
        ]);
    }

    public function update(UpdateServiceRequest $request, Service $service)
    {
        $data = $request->validated();

        $service = $this->serviceManager->update($service,$data);

        return response()->json([
            'success' => true,
            'message' => 'Service updated successfully',
            'service' => new ServiceResource($service)
        ]);
    }

    public function destroy(Service $service)
    {
        $this->serviceManager->delete($service);

        return response()->json([
            'success' => true,
            'message' => 'Service deleted successfully',
        ],200);
    }
}
